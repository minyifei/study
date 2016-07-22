<?php
/**
 * 用户对象
 * User: myf
 * Date: 16/7/22
 * Time: 上午10:50
 */

namespace Pay\Service;


class User extends Entity {

    //编号
    public $id;
    //姓名
    public $name;
    //年龄
    public $age;

    /**
     * 用户构造函数
     * @param int $id 编号
     * @param string $name 姓名
     * @param int $age 年龄
     */
    public function __construct($id, $name, $age) {
        $this->age = $age;
        $this->id = $id;
        $this->name = $name;
    }


    /**
     * 获取用户对象字符串
     * @return string
     */
    public function __toString() {
        var_dump(sprintf('__CLASS__:%s', __CLASS__));
        var_dump(sprintf('__FILE__:%s', __FILE__));
        var_dump(sprintf('__DIR__:%s', __DIR__));
        var_dump(sprintf('__FUNCTION__:%s', __FUNCTION__));
        var_dump(sprintf('__CLASS__:%s', __CLASS__));
        var_dump(sprintf('__TRAIT__:%s', __TRAIT__));
        var_dump(sprintf('__METHOD__:%s', __METHOD__));
        var_dump(sprintf('__NAMESPACE__:%s', __NAMESPACE__));
        return sprintf("id=[%d],name=[%s],age=[%d]", $this->id, $this->name, $this->age);
    }


}