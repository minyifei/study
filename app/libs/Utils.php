<?php
/**
 * 工具类
 * User: myf
 * Date: 16/7/21
 * Time: 下午3:17
 */

namespace Pay\Libs;

class Utils {

    /**
     * 检查手机号格式
     * @param string $mobile
     * @return bool 格式正确返回 true,否则返回 false
     */
    public static function checkMobile($mobile) {
        $result = filter_var($mobile, FILTER_VALIDATE_REGEXP, array(
            'options' => array('regexp' => '/^1[0-9]{10,10}$/')
        ));
        if ($result) {
            return true;
        } else {
            return false;
        }
    }


    /**
     * 保留几位小数，保留位数后的舍弃
     * @param double $num
     * @param int $digit
     * @return string
     */
    public static function retainDecimal($num, $digit = 2) {
        $ss = pow(10, $digit);
        $num = intval($num * $ss) / $ss;
        return sprintf("%.{$digit}f", $num);
    }

}