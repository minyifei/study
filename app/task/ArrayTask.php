<?php

/**
 * 数组常用函数
 * User: myf
 * Date: 16/7/20
 * Time: 下午5:24
 */

use Myf\Mvc\Task;
use Pay\Libs\Utils;

class ArrayTask extends Task {

    /**
     *
     * 常用键值操作数组函数
     *
     * array array_values ( array $input )
     * 返回数组中所有的值
     *
     * array array_keys ( array $array [, mixed $search_value [, bool $strict = false ]] )
     * 返回数组中部分的或所有的键名
     * $search_value 如果指定了这个参数，只有包含这些值的键才会返回。
     * $strict 判断在搜索的时候是否该使用严格的比较（===）。
     *
     * array array_flip ( array $trans )
     * 交换数组中的键和值
     *
     * bool in_array ( mixed $needle , array $haystack [, bool $strict = FALSE ] )
     * 检查数组中是否存在某个值
     * $strict 如果第三个参数 strict 的值为 TRUE 则 in_array() 函数还会检查 needle 的类型是否和 haystack 中的相同。
     *
     * mixed array_search ( mixed $needle , array $haystack [, bool $strict = false ] )
     * 在数组中搜索给定的值，如果成功则返回相应的键名
     * 如果可选的第三个参数 strict 为 TRUE，则 array_search() 将在 haystack 中检查完全相同的元素。 这意味着同样检查 haystack 里 needle 的 类型，并且对象需是同一个实例。
     *
     * bool array_key_exists ( mixed $key , array $search )
     * 检查给定的键名或索引是否存在于数组中
     *
     */
    public function kvAction() {
        //键名相关函数操作
        $arrFood = ['name' => '苹果', 'value' => 'apple', 'age' => 12];
        print_r(array_values($arrFood));
        print_r(array_keys($arrFood));
        print_r(array_keys($arrFood, 'apple'));
        //多维数组
        $arr = [
            'color' => array(
                'blue', 'red',
            ),
            'size' => array(
                'small', 'medium',
            ),
            'list' => array(
                'id' => '1',
                'name' => 'a',
            ),
        ];
        print_r(array_values($arr));
        print_r(array_keys($arr));
        //交换数组的键值
        print_r(array_flip($arrFood));

        //是否在数组中
        print_r(in_array('apple', $arrFood));
        print_r(in_array('12', $arrFood, true));

        //数组搜索
        print_r(array_search('apple', $arrFood));

        //查询数组中是否有键名
        print_r(array_key_exists('name', $arrFood));
        print_r(array_key_exists('birthday', $arrFood));

    }

    /**
     * 常用指针操作数组函数
     *
     * mixed current ( array &$array )别名pos
     * 返回数组中的当前单元,函数返回当前被内部指针指向的数组单元的值，并不移动指针。如果内部指针指向超出了单元列表的末端，current() 返回 FALSE
     *
     * mixed key ( array &$array )
     * 返回数组中当前单元的键名。key() 函数返回数组中内部指针指向的当前单元的键名。 但它不会移动指针。如果内部指针超过了元素列表尾部，或者数组是空的，key() 会返回 NULL。
     *
     * mixed next ( array &$array )
     * next() 和 current() 的行为类似，只有一点区别，在返回值之前将内部指针向前移动一位。这意味着它返回的是下一个数组单元的值并将数组指针向前移动了一位。
     *
     * mixed prev ( array &$array )
     * 将数组的内部指针倒回一位。
     *
     * mixed end ( array &$array )
     * end() 将 array 的内部指针移动到最后一个单元并返回其值。
     *
     * mixed reset ( array &$array )
     * reset() 将 array 的内部指针倒回到第一个单元并返回第一个数组单元的值。
     *
     * array each ( array &$array )
     * 返回数组中当前的键／值对并将数组指针向前移动一步
     *
     */
    public function pointAction() {
        $arr = ['car', 'plane', 'ship', 'bike'];
        print_r($arr);
        var_dump(current($arr));
        var_dump(key($arr));
        var_dump(next($arr));
        var_dump(next($arr));
        var_dump(prev($arr));
        var_dump(end($arr));
        var_dump(reset($arr));
        var_dump(next($arr));
        list($key, $val) = each($arr);
        var_dump($key, $val);
        var_dump(current($arr));
    }

    /**
     * 数组的栈操作函数
     *
     * int array_push ( array &$array , mixed $var [, mixed $... ] )
     * 一个或多个单元压入数组的末尾（入栈）将 array 当成一个栈，并将传入的变量压入 array 的末尾。array 的长度将根据入栈变量的数目增加。
     *
     * mixed array_pop ( array &$array )
     * 将数组最后一个单元弹出（出栈）弹出并返回 array 数组的最后一个单元，并将数组 array 的长度减一。如果 array 为空（或者不是数组）将返回 NULL。
     */
    public function stackAction() {
        $arr = [];
        //向数组中加入3个数组
        print_r(array_push($arr, 1, 2, 3));
        print_r($arr);
        //取出最后一个数字
        print_r(array_pop($arr));
        print_r($arr);
    }

    /**
     * 数组排序函数
     *
     * bool sort ( array &$array [, int $sort_flags = SORT_REGULAR ] )
     * 对数组进行排序。当本函数结束时数组单元将被从最低到最高重新安排。
     *
     * bool rsort ( array &$array [, int $sort_flags = SORT_REGULAR ] )
     * 对数组进行逆向排序（最高到最低）
     *
     * $sort_flags 排序类型标记：
     * SORT_REGULAR - 正常比较单元（不改变类型）
     * SORT_NUMERIC - 单元被作为数字来比较
     * SORT_STRING - 单元被作为字符串来比较
     * SORT_LOCALE_STRING - 根据当前的区域（locale）设置来把单元当作字符串比较，可以用 setlocale() 来改变。
     * SORT_NATURAL - 和 natsort() 类似对每个单元以“自然的顺序”对字符串进行排序。 PHP 5.4.0 中新增的。
     * SORT_FLAG_CASE - 能够与 SORT_STRING 或 SORT_NATURAL 合并（OR 位运算），不区分大小写排序字符串。
     *
     * bool usort ( array &$array , callable $cmp_function )
     * 使用用户自定义的比较函数对数组中的值进行排序
     * $cmp_functon 在第一个参数小于，等于或大于第二个参数时，该比较函数必须相应地返回一个小于，等于或大于 0 的整数
     *
     * bool array_multisort ( array &$arr [, mixed $arg = SORT_ASC [, mixed $arg = SORT_REGULAR [, mixed $... ]]] )
     * 可以用来一次对多个数组进行排序，或者根据某一维或多维对多维数组进行排序。
     * SORT_ASC - 按照上升顺序排序
     * SORT_DESC - 按照下降顺序排序
     */
    public function sortAction() {
        $arr = ["lemon", "orange", "banana", "apple"];
        print_r($arr);
        //升序
        sort($arr);
        print_r($arr);
        //降序
        rsort($arr);
        print_r($arr);


        //函数进行排序
        $arrNum = [1, 8, 9, 2, 0];
        print_r($arrNum);
        usort($arrNum, array($this, '_cmp'));
        print_r($arrNum);

        //多维数组排序，按照数组的id升序
        $arrRecords = array(
            ['id' => 1, 'name' => '苹果'],
            ['id' => 5, 'name' => '葡萄'],
            ['id' => 2, 'name' => '梨'],
            ['id' => 8, 'name' => '糯米'],
        );
        $idKeys = [];
        foreach ($arrRecords as $key => $record) {
            $idKeys[$key] = $record['id'];
        }
        echo sprintf("数组排序前:");
        print_r($arrRecords);
        echo "数组排序后:";
        array_multisort($idKeys, SORT_ASC, $arrRecords);
        print_r($arrRecords);

    }

    //usort的function
    public function _cmp($a, $b) {
        if ($a == $b) {
            return 0;
        } elseif ($a > $b) {
            return 1;
        } else {
            return -1;
        }
    }


    /**
     * 数组键名排序
     *
     * bool ksort ( array &$array [, int $sort_flags = SORT_REGULAR ] )
     * 对数组按照键名排序，保留键名到数据的关联。
     *
     * bool krsort ( array &$array [, int $sort_flags = SORT_REGULAR ] )
     * 对数组按照键名逆向排序，保留键名到数据的关联。
     *
     * bool uksort ( array &$array , callable $cmp_function )
     * 函数将使用用户提供的比较函数对数组中的键名进行排序。如果要排序的数组需要用一种不寻常的标准进行排序，那么应该使用此函数
     *
     */
    public function ksortAction() {
        $fruits = array("d" => "lemon", "a" => "orange", "b" => "banana", "c" => "apple");
        print_r($fruits);
        //key升序
        ksort($fruits);
        print_r($fruits);
        //key降序
        krsort($fruits);
        print_r($fruits);
        //通过函数排序
        uksort($fruits, array($this, '_cmp'));
        print_r($fruits);
    }


    /**
     * 常用数组操作函数
     *
     * array array_merge ( array $array1 [, array $... ] )
     * 合并一个或多个数组
     * 将一个或多个数组的单元合并起来，一个数组中的值附加在前一个数组的后面。返回作为结果的数组。
     * 如果输入的数组中有相同的字符串键名，则该键名后面的值将覆盖前一个值。然而，如果数组包含数字键名，后面的值将不会覆盖原来的值，而是附加到后面。
     * 如果只给了一个数组并且该数组是数字索引的，则键名会以连续方式重新索引。
     *
     * array array_column ( array $input , mixed $column_key [, mixed $index_key ] )
     * 返回数组中指定的一列
     * 返回input数组中键值为column_key的列， 如果指定了可选参数index_key，那么input数组中的这一列的值将作为返回数组中对应值的键。
     *
     * array array_diff ( array $array1 , array $array2 [, array $... ] )
     * 计算数组的差集
     * 对比返回在 array1 中但是不在 array2 及任何其它参数数组中的值
     * 返回一个数组，该数组包括了所有在 array1 中但是不在任何其它参数数组中的值。注意键名保留不变
     *
     * array array_unique ( array $array [, int $sort_flags = SORT_STRING ] )
     * 移除数组中重复的值
     *
     * array range ( mixed $start , mixed $limit [, number $step = 1 ] )
     * 建立一个包含指定范围单元的数组
     *
     */
    public function arrAction() {
        $array1 = array("color" => "red", 2, 4);
        $array2 = array("a", "b", "color" => "green", "shape" => "trapezoid", 4);
        //合并
        $result = array_merge($array1, $array2);
        print_r($result);

        //array_column举例
        $records = array(
            array(
                'id' => 2135,
                'first_name' => 'John',
                'last_name' => 'Doe',
            ),
            array(
                'id' => 3245,
                'first_name' => 'Sally',
                'last_name' => 'Smith',
            ),
            array(
                'id' => 5342,
                'first_name' => 'Jane',
                'last_name' => 'Jones',
            ),
            array(
                'id' => 5623,
                'first_name' => 'Peter',
                'last_name' => 'Doe',
            )
        );

        $firstNames = array_column($records, 'first_name');
        print_r($firstNames);
        //id作为数组的key,first_name作为value
        $map = array_column($records, 'first_name', 'id');
        print_r($map);

        //id作为数组的key,对象作为value
        $map = array_column($records, null, 'id');
        print_r($map);

        //计算数组差值,返回array1中在array2中没有的数据
        $array1 = array("a" => "green", "red", "blue", "red");
        $array2 = array("b" => "green", "yellow", "red");
        $result = array_diff($array1, $array2);
        print_r($result);

        //数组去重
        $input = array("a" => "green", "c" => "red", "b" => "green", "blue", "red");
        $result = array_unique($input);
        print_r($result);

        //创建一个5-20的数组
        $arrNum = range(5, 20);
        print_r($arrNum);
        //创建一个5-20的数组，返回所有的奇数
        $arrNum = range(5, 20, 2);
        print_r($arrNum);

    }


    /**
     *
     * 常用数组操作函数2 示例
     *
     */
    public function arr2Action() {

        //array_walk 自定义函数 示例
        $fruits = array("d" => "lemon", "a" => "orange", "b" => "banana", "c" => "apple");

        function testAlter(&$item1, $key, $prefix) {
            $item1 = "$prefix: $item1";
        }

        function testPrint($item2, $key) {
            echo "$key. $item2<br />\n";
        }

        //打印
        array_walk($fruits, 'testPrint');
        //修改数组的值
        array_walk($fruits, 'testAlter', 'fruit');
        //再次打印
        array_walk($fruits, 'testPrint');

        //array_pad 补齐 示例
        $input = array(12, 10, 9);
        //向右填充0，补齐size=5
        $result = array_pad($input, 5, 0);
        print_r($result);
        //向左填充8，补齐size=7
        $result = array_pad($input, -7, 8);
        print_r($result);

        //array_intersect 交集 示例
        $array1 = array("a" => "green", "red", "blue");
        $array2 = array("b" => "green", "yellow", "red");
        //返回array1中在array2中有值数组
        $result = array_intersect($array1, $array2);
        print_r($result);


        //array_map 示例

        function cube($n) {
            return ($n * 2);
        }

        $a = array(1, 2, 3, 4, 5);
        //给a的每个数字*2
        $b = array_map("cube", $a);
        print_r($b);


        //call_user_func,call_user_func_array 示例
        $mobile = '13310987222';
        $util = new Utils();
        var_dump(call_user_func(array($util,'checkMobile'),$mobile));
        var_dump(call_user_func_array(array($util,'checkMobile'),array($mobile)));
        //保留3位小数，舍掉其他小数
        $num = 32.699999;
        var_dump(call_user_func(array($util,'retainDecimal'),$num,3));
        var_dump(call_user_func_array(array($util,'retainDecimal'),array($num,3)));

    }

}