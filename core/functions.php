<?php
/**
 * 全局函数
 * User: myf
 * Date: 16/7/20
 * Time: 上午9:21
 */


/**
 * 自动加载类
 * @param string $className 类名
 * @throws Exception
 */
function loader($className) {
    $file = getClassFile($className);
    if (is_file($file)) {
        //引用文件
        require_once($file);
    }
}

/**
 * 获取类绝对文件路径
 * @global $namespaces 全局命名空间
 * @param string $className 类名
 * @return string 类文件路径
 */
function getClassFile($className) {
    global $namespaces;
    $names = explode("\\", $className);
    $class = array_pop($names);
    $key = join("\\", $names);
    //系统命名空间
    if ($key == "Myf\Mvc") {
        $path = APP_SYS_PATH;
    } else {
        $path = $namespaces[$key];
    }
    $file = $path . "/" . $class . ".php";
    return $file;
}

/**
 * 循环创建文件夹
 * @param string $dir
 * @return bool
 */
function createFolders($dir) {
    return is_dir($dir) or (createFolders(dirname($dir)) and mkdir($dir, 0777));
}

/**
 * 获取当前时间毫秒数
 * @return float
 */
function getMillisecond() {
    list($s1, $s2) = explode(' ', microtime());
    return (float)sprintf('%.0f', (floatval($s1) + floatval($s2)) * 1000);
}