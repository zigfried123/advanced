<?php

namespace console\controllers;

use phpDocumentor\Reflection\Types\String_;
use yii\console\Controller;

class Mysql
{
    public static $db;

    public static function getConnect()
    {
        if(!(self::$db instanceof \mysqli)) {
            self::$db = new \mysqli("localhost", "root", "", "test", 3307);
        }

        return self::$db;
    }
}

class HelloController extends Controller
{

    public function actionIndex()
    {

        $userIds = '1,2,4';

        $data = $this->loadUsersData($userIds);

        foreach ($data as $userId => $name) {
            echo "<a href=\"/show_user.php?id=$userId\">$name</a>";
        }

    }

    public function loadUsersData(string $userIds) {

        $mysqli = Mysql::getConnect();

        $userIdsArr = explode(',',$userIds);

        $userIdsString = implode(',',array_fill(0,count($userIdsArr), '?'));

        if($stmt = $mysqli->prepare("SELECT `id`,`name` FROM `users` WHERE `id` IN ($userIdsString)")) {

            $bindStr = str_repeat('i', count($userIdsArr));

            $stmt->bind_param($bindStr, ...$userIdsArr);

            $stmt->execute();
            $stmt->bind_result($id, $name);

            $data = [];

            while ($stmt->fetch()){
                $data[$id] = $name;
            }
        }

        $mysqli->close();

        return $data;
    }
}
