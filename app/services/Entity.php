<?php
/**
 * 对象基类
 * User: myf
 * Date: 16/7/22
 * Time: 上午11:58
 */

namespace Pay\Service;


abstract class Entity implements \ArrayAccess {


    /**
     * 设置类的成员变量
     * @param $index
     * @param $value
     */
    public function __set($index, $value) {
        $this->offsetSet($index, $value);
    }

    /**
     * 读取类的成员变量
     * @param $index
     * @return mixed
     */
    public function __get($index) {
        $this->offsetGet($index);
    }


    /**
     * 标示一个元素是否定义
     * @param mixed $index
     * @return bool
     */
    public function offsetExists($index) {
        //返回由对象属性组成的关联数组
        $arrIndex = get_object_vars($this);
        return isset($arrIndex[$index]);
    }

    /**
     * 返回一个元素的值
     * @param mixed $index
     * @return null
     */
    public function offsetGet($index) {
        $arrIndex = get_object_vars($this);
        if (isset($arrIndex[$index])) {
            return $arrIndex[$index];
        } else {
            return null;
        }
    }

    /**
     * 为一个元素的赋值
     * @param mixed $index
     * @param mixed $value
     */
    public function offsetSet($index, $value) {
        $arrIndex = get_object_vars($this);
        if (array_key_exists($index, $arrIndex)) {
            $this->$index = $value;
        }
    }

    /**
     * 删除一个元素
     * @param mixed $index
     */
    public function offsetUnset($index) {
        $arrIndex = get_object_vars($this);
        if (array_key_exists($index, $arrIndex)) {
            unset($this->$index);
        }
    }

    /**
     * 魔术方法，处理对象的set,get属性处理
     * @param string $name
     * @param array $arguments
     * @return null
     */
    public function __call($name, $arguments) {
        //把getXxx转成['get','xxx']
        $arr = getArrayFromCame($name);
        //如果是getXxx或setXxx
        if (count($arr) >= 2 && in_array($arr[0], ['get', 'set'])) {
            $method = $arr[0];
            unset($arr[0]);
            //把['xxx','yyy']转成'xxxYyy'
            $index = getCameFromArray($arr);
            switch ($method) {
                case 'get':
                    return $this->offsetGet($index);
                    break;
                case 'set';
                    if (count($arguments) > 0) {
                        $value = $arguments[0];
                        $this->offsetSet($index, $value);
                    }
                    break;
            }
        }
    }


}