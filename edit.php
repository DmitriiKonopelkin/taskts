<?php

require "db.php";

if($_SERVER['REQUEST_METHOD']== 'POST') {
    $name= $_POST['name'];
    $surname= $_POST['surname'];
    $work= $_POST['work'];
} 


?>