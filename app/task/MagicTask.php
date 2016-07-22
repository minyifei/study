<?php
use Myf\Mvc\Task;
use Pay\Service\User;

/**
 * 魔术方法及魔术常量
 * User: myf
 * Date: 16/7/22
 * Time: 上午10:55
 */
class MagicTask extends Task {

    public function mainAction() {
        $user = new User(1, 'myf', 30);
        echo sprintf("姓名：%s\n", $user->getName());
        echo sprintf("姓名：%s\n", $user->name);
        echo sprintf("姓名：%s\n", $user['name']);
        $user['name'] = '闵益飞';
        echo sprintf("姓名：%s\n", $user->getName());
        $user->name = '闵益飞A';
        echo sprintf("姓名：%s\n", $user->getName());
        echo sprintf("姓名：%s\n", $user['name']);
        echo $user . "\n";
    }

}