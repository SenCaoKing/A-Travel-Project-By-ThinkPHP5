<?php
/**
 * User: Sen
 * Date: 2018/11/12
 * Time: 19:30
 */
namespace app\server;
use OSS\Core\OssException;
use OSS\OssClient;
use think\Config;

class Alioss{
    protected static $instance = null;
    protected $urls = [];

    protected $file_type = [
        'image/png',
        'image/jpg',
        'image/jpeg',
    ];

    public static function get_instance()
    {
        if(null == self::$instance){
            self::$instance = new self;
        }
        return self::$instance;
    }


    /**
     * oss 文件上传的方法
     * @param $file_info
     * @param string $file_name
     * @param string $size
     * @param array $file_type
     * @return array
     * @throws OssException
     */
    public function upload_file($file_info, $file_name = '', $size = '3145728', $file_type = []){
        foreach($file_info as $file){

            $info = $file->getInfo();

            if($info['size'] > $size){
                throw new \Exception('上传文件超出限制');
            }

            if(empty($file_type)){
                if(!in_array($info['type'], $this->file_type)){
                    throw new \Exception('上传文件后缀不允许');
                }
            }else{
                // 自定义配置
                if(!in_array($info['type'], $file_type)){
                    throw new \Exception('上传文件后缀不允许');
                }
            }

            if(empty($file_name)){
                $file_name = date('Y-m-d');
            }

            $prefix = substr(strrchr($info['name'], '.'), 1);

            $oss_client = new OssClient(Config::get('ali_oss.accessKeyId'), Config::get('ali_oss.accessKeySecret'), Config::get('ali_oss.endpoint'));

            $object = $file_name.'/'.uniqid().'-'.date('m-d-H-i-s').'.'.$prefix;

            $response = $oss_client->uploadFile(Config::get('ali_oss.bucket'), $object, $info['tmp_name']);

            $this->urls[] = $response['info']['url'];
        }
        return $this->urls;
    }
}