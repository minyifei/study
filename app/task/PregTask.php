<?php
use Myf\Mvc\Task;

/**
 * 正则表达式
 * User: myf
 * Date: 16/7/22
 * Time: 下午3:45
 */

class PregTask extends Task{

    /**
     * int preg_match ( string $pattern , string $subject [, array &$matches [, int $flags = 0 [, int $offset = 0 ]]] )
     * 搜索subject与pattern给定的正则表达式的一个匹配.
     * $matches 如果提供了参数matches，它将被填充为搜索结果。 $matches[0]将包含完整模式匹配到的文本， $matches[1] 将包含第一个捕获子组匹配到的文本，以此类推
     * preg_match()返回 pattern 的匹配次数。 它的值将是0次（不匹配）或1次，因为preg_match()在第一次匹配后 将会停止搜索。preg_match_all()不同于此，它会一直搜索subject 直到到达结尾。 如果发生错误preg_match()返回 FALSE。
     */
    public function mainAction(){
        //非负整数
//        $pattern = '/^\d+$/';
//        var_dump(preg_match($pattern,'12'));
//        var_dump(preg_match($pattern,'0is'));
        //正整数
//        $pattern = '/^[0-9]*[1-9][0-9]*$/';
//        var_dump(preg_match($pattern,'12'));
//        var_dump(preg_match($pattern,'0'));
        //由数字和26个英文字母组成的字符串
//        $pattern = '/^[A-Za-z0-9]+$/';
//        var_dump(preg_match($pattern,'abc1234'));
//        var_dump(preg_match($pattern,'abc$1234'));
        //email地址
//        $pattern = '/^[\w-]+(\.[\w-]+)*@[\w-]+(\.[\w-]+)+$/';
//        var_dump(preg_match($pattern,'minyifei@baijiahulian.com'));
//        var_dump(preg_match($pattern,'minyifei@.com'));
        //匹配url
//        $pattern = '/^((http|ftp|https):\/\/)?[\w-_.]+(\/[\w-_]+)*\/?$/';
//        var_dump(preg_match($pattern,'minyifei@baijiahulian.com'));
//        var_dump(preg_match($pattern,'http://www.genshuixue.com'));
        //字母开头，允许5-16字节，允许字母数字下划线
        $pattern = '/^[a-zA-Z][a-zA-Z0-9_]{4,15}$/';
        var_dump(preg_match($pattern,'abc1233'));
        //匹配手机号
        $pattern = '/^1[3456789]{1}\d{9}$/';
        var_dump(preg_match($pattern,'122999'));
        var_dump(preg_match($pattern,'13717603728'));
    }

}