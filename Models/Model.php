<?php
session_start();
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
        session_start();
        $mysqli = $this->dataBaseConnector();
        if (($file = fopen("./../Models/users-1.csv", "r")) !== false) {

            while (($data = fgetcsv($file, 1000)) !== false) {

                $_SESSION['data'] = $data;
                // $mysqli->query("INSERT INTO `users` (`uid`,`name`,`age`,`email`,`phone`,`gender`) VALUES ('{$data[0]}','{$data[1]}','{$data[2]}','{$data[3]}','{$data[4]}','{$data[5]}')");

            }
            fclose($file);
        }
        header('Location: ./../Views/importList.php');
        exit();
    }
}

$modelObj = new Model();
$arr = $modelObj->readOffFileToBase();
