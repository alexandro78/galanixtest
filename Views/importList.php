<?php
session_start();

if (isset($_SESSION['data'])) {    
    print_r($_SESSION['data']);
 }
?>
<br><br>
 <a href="./../index.php">Import data</a>
