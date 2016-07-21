<?php
/**
 * 自定义异常
 * User: myf
 * Date: 16/7/21
 * Time: 下午3:40
 */
namespace Pay\Service;

use Myf\Mvc\Log;

class MyException extends \Exception {

    //通用错误
    const ERROR = 1;
    //参数错误
    const PARAM_ERROR = 2;

    public function __construct($code = self::ERROR) {

        $error = '通用错误';
        switch ($code) {
            case self::PARAM_ERROR:
                $error = '参数错误';
                break;
        }
        parent::__construct($error, $code);
    }


    /**
     * 全局异常处理
     * @param $errNo
     * @param $errStr
     * @param $errFile
     * @param $errLine
     */
    public static function handlerError($errNo, $errStr, $errFile, $errLine){
        $error = sprintf("错误=%s\n文件=%s\n行数=%s",$errStr,$errFile,$errLine);
        //写入日志
        Log::write($error);
        //输出到控制台
        echo $error."\n";
    }

    /**
     * 全局函数，所有程序运行结束时执行
     */
    public static function shutdown(){
        $str = '运行结束了';
        Log::write($str);
        echo $str."\n";
    }
}