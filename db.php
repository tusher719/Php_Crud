<?php
    $db_name = 'db_crud';
    $db_username = 'root';
    $db_password = '';
    $hostname = 'localhost';

    $db_connect = mysqli_connect($hostname, $db_username, $db_password, $db_name);

//    if($db_connect){
//        echo 'Database Connect';
//    } else {
//        echo 'Database Error 404';
//    }
?>