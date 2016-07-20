<?php

/**
 * php编码规范示例
 * User: myf
 * Date: 16/7/20
 * Time: 上午9:59
 */

use Myf\Mvc\Task;

/**
 * 文件名与类名大小写一直
 * Class NameTask
 */
class NameTask extends Task{

    //默认每页显示记录数量
    const PAGE_SIZE = 10;

    /**
     * 方法命名,驼峰
     */
    public function methodAction(){
        $arrFood = [
            '米饭','苹果',
        ];
        //打印数组
        var_dump($arrFood);
        //处理用户资料，给前端返回数据
        $arrUser = [
            ['user_id'=>'1','name'=>'闵益飞','age'=>'30','avatar'=>'***'],
            ['user_id'=>'2','name'=>'闵益飞','age'=>'30','avatar'=>'000'],
        ];
        /*
         * 这里需要注意，格式化前，用户的user_id为字符串，age也为字符串；格式化后变为数字类型；
         * 如果这个数据是返回给android或ios开发使用，就要特别留意，他们是强类型校验
         * */
        echo json_encode($arrUser)."\n";
        $arrUser = $this->_formatData($arrUser);
        echo json_encode($arrUser);
    }

    /**
     * 获取一个优惠劵
     * @param string $number
     */
    public function findOneCouponByNumber($number){

    }

    /**
     * 格式化用户
     * @param array $arrUser 需要格式化的用户集合
     * @return array 格式化后的用户数组
     */
    private function _formatData($arrUser){
        $arrData = [];
        foreach($arrUser as $key=> $obj){
            //姓名
            $strName = $obj['name'];
            //年龄
            $intAge = intval($obj['age']);
            //用户编号
            $intUserId = intval($obj['user_id']);
            //格式化处理
            $arrData[]=['user_id'=>$intUserId,'name'=>$strName,'age'=>$intAge];
        }
        return $arrData;
    }

}