<?php
/**
 * 基类任务
 * User: myf
 * Date: 16/7/20
 * Time: 上午10:01
 */

namespace Myf\Mvc;

class Task {

    //开始时间
    private $_startTime;

    /**
     * 全局任务执行前处理方法
     */
    public function _beforeMethodAction(){
        //开始时间毫秒
        $this->_startTime = getMillisecond();
        /*
         * 此区域可以写全局前置处理业务
         */
        Log::write('===beforeMethodAction==');
    }

    /**
     * 全局任务执行后处理方法
     */
    public function _afterMethodAction(){
        /*
         * 此区域可以写全局后置处理业务
         */
        //结束时间毫秒
        $endTime = getMillisecond();
        Log::write(sprintf("===afterMethodAction===,runtime=【%s】ms",($endTime-$this->_startTime)));
    }

}