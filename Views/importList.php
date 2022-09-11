<?php
session_start();

if (isset($_SESSION['data'])) {    
    print_r($_SESSION['data']);
 }
?>
<br><br>
 <a href="home.php">Import data</a>
