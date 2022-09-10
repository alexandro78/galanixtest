<?php

class Model
{

    var $host = 'localhost';
    var $login = 'root';
    var $password = '';
    var $dataBase = 'galanix_base';

    public function dataBaseConnector()
    {
        return $mysqli = new mysqli($this->host, $this->login, $this->password, $this->dataBase);

        // $mysqli->close();

    }

    public function readOffFile()
    {
        $mysqli = $this->dataBaseConnector();
        if (($file = fopen("users-1.csv", "r")) !== false) {

            while (($data = fgetcsv($file, 1000)) !== false) {

                print_r($data);
                $mysqli->query("INSERT INTO `users` (`uid`,`name`,`age`,`email`,`phone`,`gender`) VALUES ('{$data[0]}','{$data[1]}','{$data[2]}','{$data[3]}','{$data[4]}','{$data[5]}')");

            }
            fclose($file);
        }

    }
}

$obj = new Model();
$obj->readOffFile();
