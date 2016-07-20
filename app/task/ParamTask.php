<?php


/**
 * 参数校验规范
 * User: myf
 * Date: 16/7/20
 * Time: 上午11:33
 */

use Myf\Mvc\Task;

class ParamTask extends Task {

    //入口
    public function mainAction() {
        /**
         * 产生原因:
         * 一方面自己没这方面的意识，有些数据没有经过严格的验证，然后直接拼接 SQL 去查询。导致漏洞产生，比如：
         */
        //$id = $_GET['id'];
        $id = '1 or 1=1';
        $sql = "select * from test where id=$id";
        var_dump($sql);
        //如果我们做了类型校验如下,就能安全一些
        $intId = intval($id);
        $sql = "select * from test where id=$intId";
        var_dump($sql);
        //还有写入数据时需要了解数据库的字段的长度,如test表的name字段最多10个字符
        //$name=  $_REQUEST['name'];
        $name = "还有写入数据时需要了解数据库的字段的长";
        var_dump($name);
        //需要截取字符串，防止数据库异常
        $strName = mb_substr($name, 0, 10);
        var_dump($strName);
        //数据库读写时，建议尽量使用PDO或Phalcon默认函数

    }

    /**
     * 从主库读取
     * @param int $id
     * @return mixed
     */
    public function findTaskById($id) {
        $conn = BaseDao::getPdo('db_name');
        $sql = sprintf("select * from table_name where id=:id");
        $sql = DB::DRDS_USE_MASTER_HINT . $sql;
        $record = $conn->fetchOne($sql, Util::ASSOS, ['id' => $id]);
        return $record;
    }

    /**
     * 更新数据
     * @param int $id
     * @param array $data
     */
    public function updateData($id, $data) {
        $conn = BaseDao::getPdo('db_name');
        return $conn->updateAsDict('table_name', $data, 'id=' . $id);
    }

    /**
     * 插入数据
     * @param array $data
     */
    public function insertData($data) {
        $conn = BaseDao::getPdo('db_name');
        return $conn->insertAsDict('table_name', $data);
    }

}