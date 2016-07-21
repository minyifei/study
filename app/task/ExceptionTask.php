<?php

/**
 * 异常处理
 * User: myf
 * Date: 16/7/21
 * Time: 下午3:39
 */

use Myf\Mvc\Task;
use Pay\Service\MyException;

/**
 *
 * class Exception{
 * protected $message = 'Unknown exception'; // 异常信息
 * protected $code = 0; // 用户自定义异常代码
 * protected $file; // 发生异常的文件名
 * protected $line; // 发生异常的代码行号
 * function __construct($message = null, $code = 0);
 * final function getMessage(); // 返回异常信息
 * final function getCode(); // 返回异常代码
 * final function getFile(); // 返回发生异常的文件名
 * final function getLine(); // 返回发生异常的代码行号
 * final function getTrace(); // backtrace() 数组
 * final function getTraceAsString(); // 已格成化成字符串的 getTrace() 信息
 * function __toString(); // 可输出的字符串
 * }
 * Class ExceptionTask
 */
class ExceptionTask extends Task {

    public function mainAction() {
        try {
            throw new MyException(2);
            //$this->_textException();
        } catch (MyException $e) {
            var_dump(sprintf("MyException ex=%s", $e->getMessage()));
            var_dump($e->getMessage());
            var_dump($e->getCode());
            var_dump($e->getFile());
            var_dump($e->getLine());
            var_dump($e->getTrace());
            var_dump($e->getTraceAsString());
        } catch (Exception $e) {
            var_dump(sprintf("Exception ex=%s", $e->getMessage()));
        }
    }

    //自定义错误
    public function exAction() {
        throw new MyException(2);
    }

    //系统函数调用错误
    public function exfunAction() {
        call_user_func([11], 1);
    }

    //程序运行结束时执行
    public function shutdownAction() {

    }

    //测试异常
    private function _textException() {
        throw new Exception("错误来了");
    }


}