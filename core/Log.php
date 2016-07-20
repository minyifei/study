<?php
/**
 * 日志类
 * User: myf
 * Date: 16/7/20
 * Time: 上午10:29
 */
namespace Myf\Mvc;

class Log {

    //日志级别，错误
    const ERROR = "ERROR";
    //日志级别，调试
    const DEBUG = "DEBUG";
    //日志级别，SQL
    const SQL = "SQL";
    //日志级别，警告
    const NOTICE = "NOTICE";

    //日志记录方式，文件存储
    const FILE = 3;

    //日期格式
    static $format = '[ c ]';

    /**
     * 写日志
     * @param string $message 日志内容
     * @param string $level 日志级别
     * @param string $file 写入文件
     */
    public static function write($message,$level=self::DEBUG,$file=''){
        //设置默认文件写入地址
        if(empty($file)){
            $file = LOG_PATH.'/'.date("y_m_d").".log";
        }
        $dir = dirname($file);
        //判断文件目录是否存储，如果不存在创建值
        is_dir($dir) or (createFolders(dirname($dir)) and mkdir($dir, 0777));
        //时间格式
        $now = date(self::$format);
        //文件存储
        $type=self::FILE;
        if ($level == self::DEBUG) {
            error_log("{$now} \033[34m {$level}: \033[0m {$message}\r\n", $type, $file);
        } else if ($level == self::ERROR) {
            error_log("{$now} \033[31m {$level}: \033[0m {$message}\r\n", $type, $file);
        } else {
            error_log("{$now} \033[37m {$level}: \033[0m {$message}\r\n", $type, $file);
        }
    }

}