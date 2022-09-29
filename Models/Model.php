<?php

class Model
{

    public $host = 'localhost';
    public $login = 'root';
    public $password = '';
    public $dataBase = 'galanix_base';
    public $checkArr = ['UID', 'Name', 'Age', 'Email', 'Phone', 'Gender'];

    public function dataBaseConnector()
    {
        return $mysqli = new mysqli($this->host, $this->login, $this->password, $this->dataBase);

        // $mysqli->close();

    }

    public function readOffFileToBase()
    {
        $mysqli = $this->dataBaseConnector();
        if (($file = fopen("./../Models/" . $_FILES['userfile']['name'], "r")) !== false) {

            $data = fgetcsv($file, 1000);
            for ($j = 0; $j < count($this->checkArr); $j++) {
                if ($this->checkArr[$j] == $data[$j]) {
                    $g = $this->checkArr[$j] == $data[$j];
                } else {
                    return print_r('file invalid structure error');
                }
            }
            while (($data = fgetcsv($file, 1000)) !== false) {

                $checkExistUid = $mysqli->query("SELECT `uid` FROM `users` WHERE `uid` = $data[0]");

                if ($checkExistUid->num_rows == 1) {
                    $mysqli->query("UPDATE `users` SET `name`= '{$data[1]}', `age`= '{$data[2]}', `email`= '{$data[3]}', `phone`= '{$data[4]}', `gender`= '{$data[5]}' WHERE `uid` = '{$data[5]}';");
                } else {
                    $mysqli->query("INSERT INTO `users` (`uid`,`name`,`age`,`email`,`phone`,`gender`) VALUES ('{$data[0]}','{$data[1]}','{$data[2]}','{$data[3]}','{$data[4]}','{$data[5]}')");
                }
            }
            fclose($file);
        }
        header('Location: ./../Views/importList.php');
        // exit();
    }

    public function filterData()
    {
        $mysqli = new mysqli('localhost', 'root', '', 'galanix_base');

        if ($_GET["id"] != "") {
            print_r("there is id ");
            $result = $mysqli->query("SELECT `id`,`uid`,`name`, `age`,`email`,`phone`,`gender` FROM `users` WHERE `id` = {$_GET["id"]}");
            $chek++;
        }

        if ($_GET["uid"] != "") {
            print_r("there is uid ");
            // retrive data filtered by uid
            $result = $mysqli->query("SELECT `id`,`uid`,`name`, `age`,`email`,`phone`,`gender` FROM `users` WHERE `uid` = {$_GET["uid"]}");
            $chek++;
        }

        if ($_GET["name"] != "") {
            print_r("there is name ");
            // retrive data filtered by name
            $result = $mysqli->query("SELECT `id`,`uid`,`name`, `age`,`email`,`phone`,`gender` FROM `users` WHERE `name` = {$_GET["name"]}");
            $chek++;
        }

        if ($_GET["age"] != "") {
            print_r("there is age ");
            // retrive data filtered by age
            $result = $mysqli->query("SELECT `id`,`uid`,`name`, `age`,`email`,`phone`,`gender` FROM `users` WHERE `age` = {$_GET["age"]}");
            $chek++;
        }

        if ($_GET["email"] != "") {
            print_r("there is email ");
            // retrive data filtered by email
            $result = $mysqli->query("SELECT `id`,`uid`,`name`, `age`,`email`,`phone`,`gender` FROM `users` WHERE `email` = {$_GET["email"]}");
            $chek++;
        }

        if ($_GET["phone"] != "") {
            print_r("there is phone ");
            // retrive data filtered by phone
            $result = $mysqli->query("SELECT `id`,`uid`,`name`, `age`,`email`,`phone`,`gender` FROM `users` WHERE `phone` = {$_GET["phone"]}");

        }

        if ($_GET["gender"] != "") {
            print_r("there is gender ");
            // retrive data filtered by gender
            $result = $mysqli->query("SELECT `id`,`uid`,`name`, `age`,`email`,`phone`,`gender` FROM `users` WHERE `gender` = {$_GET["gender"]}");
            $chek++;
        }
        if ($chek) {
            return $result;
        } else {
            header('Location: ./../Views/importList.php');
        }

    }

    public function showDataFromTable()
    {
        $mysqli = $this->dataBaseConnector();
        return $mysqli->query("SELECT `id`,`uid`,`name`, `age`,`email`,`phone`,`gender` FROM `users`");
    }

    public function clearMethod()
    {
        $mysqli = $this->dataBaseConnector();
        $mysqli->query("DELETE FROM `users`");
    }

}
