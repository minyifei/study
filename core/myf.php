<?php
/**
 * mvc核心入口文件
 * User: myf
 * Date: 16/7/20
 * Time: 上午9:18
 */

//设置时区为中国，其中PRC为“中华人民共和国”
date_default_timezone_set('PRC');
//系统配置路径，也就是core目录路径
define('APP_SYS_PATH', dirname(__FILE__));
//网站配置路径，
define('APP_SITE_PATH', dirname(dirname(__FILE__)));
//程序入口目录
define('APP_DIR', APP_SITE_PATH . "/app");
//引用全局函数,require,require_one区别：require_once() 函数会先检查目标档案的内容是不是在之前就已经导入过了，如果是的话，便不会再次重复导入同样的内容
require_once(APP_SYS_PATH . "/functions.php");
//定义临时目录
define('TMP_PATH', "/tmp/study/");
//定义log目录
define('LOG_PATH', TMP_PATH . "/log");
//定义命名空间
$namespaces = array(
    //类库命名空间
    'Pay\Libs' => APP_DIR . "/libs",
    //服务类命名空间
    'Pay\Service' => APP_DIR . "/services",
);
//设置自动加载命名空间处理函数
spl_autoload_register('loader');

//处理全局异常
set_error_handler('\Pay\Service\MyException::handlerError');
//程序运行结束时执行
//register_shutdown_function('\Pay\Service\MyException::shutdown');

//接受的参数个数,至少需要接受2个参数
if ($argc >= 2) {
    //控制器名称
    $controllerName = $argv[1];
    //动作名称
    $actionName = "main";
    //如果有第三个参数，则为需要执行的动作
    if (isset($argv[2])) {
        $actionName = $argv[2];
    }
    //拼接动作方法名称
    $actionMethod = $actionName . "Action";
    //类名
    $className = ucfirst($controllerName) . "Task";
    //类文件路径
    $classFile = APP_DIR . '/task/' . $className . '.php';
    if (file_exists($classFile)) {
        //require一个文件存在错误的话，那么程序就会中断执行了，并显示致命错误
        //include一个文件存在错误的话，那么程序不会中端，而是继续执行，并显示一个警告错误。
        include_once($classFile);
        //创建一个任务对象
        $task = new $className();
        //全局
        try{
            $args = [
                'class_name'=>$className,
                'method_name'=>$actionMethod,
            ];
            //前置任务
            $task->_beforeMethodAction($args);
            //执行任务中的方法
            $task->$actionMethod();
        }catch (\Exception $e){
            //处理异常
            echo sprintf("myf.php Exception 【%s】 \n",$e->getTraceAsString());
        }finally{
            //确保后置任务一定能够被执行
            $task->_afterMethodAction($args);
        }
    } else {
        echo sprintf("%s not found\n", $classFile);
    }
} else {
    echo sprintf("argv[%s] at last 2 parameters are required\n", json_encode($argv));
}