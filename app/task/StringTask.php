<?php

/**
 * 字符串常用函数
 * User: myf
 * Date: 16/7/20
 * Time: 下午12:56
 */

use Myf\Mvc\Task;

class StringTask extends Task {

    //入口
    public function mainAction() {
        //字符串的三种定义方式
        $strName = '闵益飞';
        var_dump($strName);
        $strHello = "你好,{$strName}";
        var_dump($strHello);
        $strTask = '{$strName},你的任务来了';
        var_dump($strTask);
        //大量的文本字符串需要用定界符
        $strBody = <<<Body
<table height="20">
	<tr><td>
	{$strName}<br/>
	<script>
	var p='hello world';
	document.writeln(p);
	</script>
	</td></tr>
</table>
Body;
        var_dump($strBody);
    }

    /**
     * 基础函数举例
     */
    public function strAction() {
        $a = 10;
        var_dump($a);
        //强制转成string
        $strA = strval($a);
        var_dump($strA);
        var_dump(gettype($strA));
        /**
         * isset
         * 若变量不存在则返回 false
         * 若变量存在且其值为NULL，也返回 false
         * 若变量存在且值不为NULL，则返回 true
         * 同时检查多个变量时，每个单项都符合上一条要求时才返回 TRUE，否则结果为 FALSE
         * PHP函数isset()只能用于变量，传递任何其它参数都将造成解析错误。
         */
        var_dump(isset($a, $b, $strA));
        //var_dump(isset(0));
        var_dump(isset($a));
        /**
         * empty
         * 若变量不存在则返回 TRUE
         * 若变量存在且其值为""、0、"0"、NULL、、FALSE、array()、var $var; 以及没有任何属性的对象，则返回 true
         * 若变量存在且值不为""、0、"0"、NULL、、FALSE、array()、var $var; 以及没有任何属性的对象，则返回 false
         * empty() 只能用于变量，传递任何其它参数都将造成Paser error而终止运行
         */
        var_dump(empty($a));
        $var = false;
        var_dump(empty($var));
        var_dump(isset($var));
    }

    /**
     * 从字符串中去除 HTML 和 PHP 标记
     * strip_tags(string,allow)
     * string 必需。规定要检查的字符串。
     * allow 可选。规定允许的标签。这些标签不会被删除。
     * 注意：HTML注释总是被删除
     */
    public function stripTagsAction() {
        $strHtml = '<p>Test paragraph.</p><!-- Comment --> <a href="#fragment">Other text</a><html>my name is html</html>';
        var_dump($strHtml);
        //过滤html标签
        var_dump(strip_tags($strHtml));
        //保留a标签
        var_dump(strip_tags($strHtml, '<a>'));
        //保留a标签和p标签
        var_dump(strip_tags($strHtml, '<a><p>'));
    }

    /**
     * 函数以其他字符替换字符串中的一些字符（区分大小写）
     * str_replace(find,replace,subject,count)
     * find 必需。规定要查找的值;一个数组可以指定多个目标
     * replace 必需。规定替换 find 中的值的值;一个数组可以被用来指定多重替换。
     * subject 必需。规定被搜索的字符串或数组。
     * count 可选。它的值将被设置为替换发生的次数
     * 注意：str_ireplace()函数不区分大小写
     */
    public function strReplaceAction() {
        $strName = '我是闵益飞，我的title是php开发工程师,你的title是什么呢？';
        $strFind = 'title';
        $strReplace = '[职位]';
        var_dump(str_replace($strFind, $strReplace, $strName, $count));
        var_dump(sprintf("一共替换了 %d 个 %s", $count, $strFind));

        //数组方式匹配替换
        $arrFind = ['闵益飞', 'title'];
        $arrReplace = ['minyifei', '[职位]'];
        //$arrReplace = ['[职位]'];
        var_dump(str_replace($arrFind, $arrReplace, $strName));
    }

    /**
     * strlen ( string $string )
     * 返回给定的字符串 string 的长度
     * string 需要计算长度的字符串
     * 注意：字符串长度strlen,1个中文3个字符
     *
     * mb_strlen ( string $str [, string $encoding = mb_internal_encoding() ] )
     * 获取一个 string 的长度。
     * str 要检查长度的字符串。
     * encoding 参数为字符编码。如果省略，则使用内部字符编码。
     */
    public function strLenAction() {
        $strInfo = "strlen是函数";
        //输出6+3*3=15
        var_dump(strlen($strInfo));
        //输出6+3=9
        var_dump(mb_strlen($strInfo));
    }

    /**
     * string substr ( string $string , int $start [, int $length ] )
     * 返回字符串的子串
     * string 输入字符串。必须至少有一个字符。
     * start 如果 start 是非负数，返回的字符串将从 string 的 start 位置开始，从 0 开始计算。例如，在字符串 “abcdef” 中，在位置 0 的字符是 “a”，位置 2 的字符串是 “c” 等等。
     *       如果 start 是负数，返回的字符串将从 string 结尾处向前数第 start 个字符开始。
     *       如果 string 的长度小于 start，将返回 FALSE。
     * length 如果提供了正数的 length，返回的字符串将从 start 处开始最多包括 length 个字符（取决于 string 的长度）
     *        如果提供了负数的 length，那么 string 末尾处的许多字符将会被漏掉（若 start 是负数则从字符串尾部算起）。如果 start 不在这段文本中，那么将返回一个空字符串。
     *        如果提供了值为 0，FALSE 或 NULL 的 length，那么将返回一个空字符串。
     *        如果没有提供 length，返回的子字符串将从 start 位置开始直到字符串结尾。
     *
     * string mb_substr ( string $str , int $start [, int $length = NULL [, string $encoding = mb_internal_encoding() ]] )
     */
    public function subStrAction() {
        $str = 'abcdef';
        var_dump(substr($str, 2));//返回 "cdef"
        var_dump(substr($str, -1));    // 返回 "f"
        var_dump(substr($str, -2));    // 返回 "ef"
        var_dump(substr($str, -3, 1)); // 返回 "d"
        var_dump(substr($str, 0, 2));//返回 "ab"

        $strChinese = "我是中国人";
        var_dump(substr($strChinese, 0, 2));//乱码
        var_dump(mb_substr($strChinese, 0, 2));//我是
        var_dump(mb_substr($strChinese, 2));//中国人
        var_dump(mb_substr($strChinese, -2, 2));//国人，从右向左数两个位置，再取2个字符
    }

    /**
     * 查找字符串首次出现的位置
     * mixed strpos ( string $haystack , mixed $needle [, int $offset = 0 ] )
     * $haystack 在该字符串中进行查找
     * $needle 如果 needle 不是一个字符串，那么它将被转换为整型并被视为字符的顺序值。
     * $offset 如果提供了此参数，搜索会从字符串该字符数的起始位置开始统计，这个偏移量不能是负数。
     */
    public function strPosAction() {
        $strUrl = 'http://www.baijiahulian.com';
        var_dump(strpos($strUrl, 'http'));
        var_dump(strpos($strUrl, 'www'));
        var_dump(strpos($strUrl, 'min'));
        $strName = "我是闵益飞";
        var_dump(strpos($strName, '是'));
    }

    /**
     * string implode ( string $glue , array $pieces )
     * string implode ( array $pieces )
     * 将一个一维数组的值转化为字符串,别名join
     *
     * array explode ( string $delimiter , string $string [, int $limit ] )
     * 使用一个字符串分割另一个字符串
     * $limit 返回的分割为$limit数量的数组
     */
    public function joinAction() {
        //数组转字符串
        $arrFood = ['苹果', '梨'];
        var_dump(implode($arrFood));
        var_dump(join(",", $arrFood));
        //字符串转数组
        $strFoods = '苹果,梨,香蕉';
        var_dump(explode(",", $strFoods));
        var_dump(explode(",", $strFoods, 2));//返回的数组有2个元素
        list($apple, $pear, $banana) = explode(",", $strFoods);
        var_dump($apple, $pear, $banana);
    }

    /**
     * string json_encode ( mixed $value [, int $options = 0 [, int $depth = 512 ]] )
     * 对变量进行 JSON 编码
     * $option 参考:http://php.net/manual/zh/json.constants.php
     *
     * mixed json_decode ( string $json [, bool $assoc = false [, int $depth = 512 [, int $options = 0 ]]] )
     * 对 JSON 格式的字符串进行解码
     */
    public function jsonAction() {
        //对数组或对象进行json编码
        $arr = array(
            'a' => 1, 'b' => 2,
            'two' => array(
                'c' => 3,
                'd' => 4,
            )
        );
        var_dump(json_encode($arr));
        //中文
        $arrChinese = array(
            'name'=>'闵益飞',
            'age'=>30,
        );
        var_dump(json_encode($arrChinese));
        //输出正确的中文
        var_dump(json_encode($arrChinese,JSON_UNESCAPED_UNICODE));


        //对json格式字符串进行解码
        $strJson = '{"name":"闵益飞","age":30}';
        //转成对象
        $obj = json_decode($strJson);
        var_dump($obj);
        var_dump($obj->name);
        //转成数组
        var_dump(json_decode($strJson,true));
        //数字处理
        $json = '{"number": 12345678901234567890}';
        var_dump(json_decode($json,true));
        var_dump(json_decode($json, true, 512, JSON_BIGINT_AS_STRING));
        //特殊字符
        $strJson = '{"name":"8822中文/%208️8\u95f5\u76ca\u98de"}';
        var_dump(json_decode($strJson,true));
    }

    /**
     * string sprintf ( string $format [, mixed $args [, mixed $... ]] )
     * 格式化字符串
     * format	必需。转换格式。
     * arg1	必需。规定插到 format 字符串中第一个 % 符号处的参数。
     * arg2	可选。规定插到 format 字符串中第二个 % 符号处的参数。
     * arg++ 可选。规定插到 format 字符串中第三、四等等 % 符号处的参数。
     * 参数 format 是转换的格式，以百分比符号 ("%") 开始到转换字符结束。下面的可能的 format 值：
            %% - 返回百分比符号
            %b - 二进制数
            %c - 依照 ASCII 值的字符
            %d - 带符号十进制数
            %e - 可续计数法（比如 1.5e+3）
            %u - 无符号十进制数
            %f - 浮点数(local settings aware)
            %F - 浮点数(not local settings aware)
            %o - 八进制数
            %s - 字符串
            %x - 十六进制数（小写字母）
            %X - 十六进制数（大写字母）
     */
    public function sprintfAction(){
        $numA = 22.76542;
        $numB = 23.45999;
        //php保留两位小数并且四舍五入
        var_dump(sprintf("%.2f",$numA));
        var_dump(sprintf("%.2f",$numB));
        //结果是啥呢
        var_dump((0.6*6) == 3.6);
        //取2小数,舍弃其他小数
        $num = 123213.99999;
        var_dump(sprintf("%.2f",intval($num*100)/100));
        var_dump(sprintf("%.2f",floor($num*100)/100));
        //分数相乘
        $numC = 0.6*6*100;
        var_dump($numC);
        var_dump(intval($numC));
        var_dump(intval(sprintf("%.1f",$numC)));
        //进一法取整
        var_dump(ceil(4.3));//5
        var_dump(ceil(8.999));//9
        var_dump(ceil(8.4999));//9
        //舍去法取整,只保留整数位
        var_dump(floor(4.3));//4
        var_dump(floor(8.999));//8

        //数字对比
        $dblA = 0.34;
        $dblB = 0.01*34.0;
        var_dump($dblA==$dblB);
    }

    /**
     * string uniqid ([ string $prefix = "" [, bool $more_entropy = false ]] )
     * 生成一个唯一ID
     * $prefix 有用的参数。例如：如果在多台主机上可能在同一微秒生成唯一ID。
     * $more_entropy 如果设置为 TRUE，uniqid() 会在返回的字符串结尾增加额外的煽（使用combined linear congruential generator）。 使得唯一ID更具唯一性。
     * prefix为空，则返回的字符串长度为13。more_entropy 为 TRUE，则返回的字符串长度为23。
     *
     * int rand ( int $min , int $max )
     * int mt_rand ( int $min , int $max ) 比 rand快4倍
     *
     */
    public function uniqidAction(){
        var_dump(uniqid());
        var_dump(uniqid('php_'));
        var_dump(uniqid('php_',true));
        var_dump(uniqid(rand(),true));
        var_dump(uniqid(mt_rand(),true));
        var_dump(md5(uniqid(mt_rand(),true)));
    }

}