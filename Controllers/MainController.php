<?php
include './../Models/Model.php';

// function my_autoload ($pClassName) {
//     include(__DIR__ . "/" . $pClassName . ".php");
// }
// spl_autoload_register("my_autoload");

class MainController
{

    public function getFormData()
    {
        //dirname(__FILE__);
        $uploaddir = './../Models/';
        $uploadfile = $uploaddir . basename($_FILES['userfile']['name']);


        
        echo '<pre>';
        if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
            echo "File was successfully uploaded for import\n";
        } else {
            echo "Possible file upload attack!\n";
        }

    }

}

$controllerObj = new MainController();
$controllerObj->getFormData();

$modelObj = new Model();
$modelObj->readOffFileToBase();

