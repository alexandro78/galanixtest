<?php

class Model
{

    public $host = 'localhost';
    public $login = 'root';
    public $password = '';
    public $dataBase = 'galanix_base';

    public function dataBaseConnector()
    {
        return $mysqli = new mysqli($this->host, $this->login, $this->password, $this->dataBase);

        // $mysqli->close();

    }

    public function readOffFileToBase()
    {
        // session_start();"users-1.csv"
        $mysqli = $this->dataBaseConnector();
        if (($file = fopen("./../Models/" . $_FILES['userfile']['name'], "r")) !== false) {
            $i = 0;
            while (($data = fgetcsv($file, 1000)) !== false) {
                if ($i != 0) {
        
                    $checkExistUid = $mysqli->query("SELECT `uid` FROM `users` WHERE `uid` = $data[0]");
              
                    if ($checkExistUid->num_rows == 1) {
                        $mysqli->query("UPDATE `users` SET `name`= '{$data[1]}', `age`= '{$data[2]}', `email`= '{$data[3]}', `phone`= '{$data[4]}', `gender`= '{$data[5]}' WHERE `uid` = '{$data[5]}';");
                    } else {
                        $mysqli->query("INSERT INTO `users` (`uid`,`name`,`age`,`email`,`phone`,`gender`) VALUES ('{$data[0]}','{$data[1]}','{$data[2]}','{$data[3]}','{$data[4]}','{$data[5]}')");
                    }
                }
                $i++;
                $_SESSION['data'][$i] = $data;
            }
            fclose($file);
        }
        header('Location: ./../Views/importList.php');
        // exit();
    }
}
