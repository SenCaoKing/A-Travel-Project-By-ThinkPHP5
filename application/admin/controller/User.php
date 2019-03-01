<?php
/**
 * Created by PhpStrom.
 * User: Sen
 * Date: 2018/12/28
 * Time: 21:00
 */
namespace app\admin\controller;

class User extends Base{
    public function guideList(){
        $search = search($this->params, ['mobile'], [], ['status']);
        dump($search);
        $where = $search['where'] ?: '';
        $list = $this->guide
            ->where($where)
            ->order('uid desc')
            ->paginate(10, false, ['query' => $this->params, 'var_page' => 'page']);
        return view('guideList', ['list' => $list, 'params' => $search['params']]);
    }

    public function guideShow(){
        $info = $this->guide
            ->alias('a')
            ->field('a.*, b.name, b.id_num, b.guide_card, b.bank_name, b.bank_num, b.positive_id_path, b.negative_id_path, b.hand_id_path, b.guide_card_path, c.drivers, c.travel, c.frame, c.car_type, c.manned, c.plate')
            ->join([['guide_info b', 'a.uid = b.uid', 'left'], ['drivers c', 'a.uid = c.uid', 'left']])
            ->where(['a.uid'=>$this->params['uid']])
            ->find();
        $labels = $this->guide_label
            ->column('label');
        $info['label'] = implode(' ', $labels);
        return view('guideShow', ['info'=>$info]);
    }

    public function guideStatus(){
        if(IS_AJAX){
            try{
                $status = $this->params['status'] == 2 ? 4 : 2;
                $this->guide->update(['status'=>$status, 'uid'=>$this->params['uid']]);
            } catch(\Exception $e){
                return _error($e->getMessage(), $e->getCode());
            }
            return _success($status);
        }
    }

    public function guideAudit(){
        if(IS_AJAX){
            try{
                $this->guide->update(['status'=>$this->params['status'], 'uid'=>$this->params['uid']]);
            } catch (\Exception $e){
                return _error($e->getMessage(), $e->getCode());
            }
            return _success();
        }
    }

    public function guideReset(){
        if(IS_POST){
            try{
                $info = $this->guide->where(['mobile'=>$this->params['mobile']])->find();
                if ($info) {
                    throw new \LogicException('手机号已存在', 1000);
                }
                $this->guide->update(['mobile'=>$this->params['mobile'], 'uid'=>$this->params['uid']]);
            } catch (\Exception $e) {
                return _error($e->getMessage(), $e->getCode());
            }
            return _success();
        }
        $uid = $this->params['uid'];
        return view('guideReset', ['uid'=>$uid]);
    }

    public function userlist(){
        return view('userList');
    }
}
