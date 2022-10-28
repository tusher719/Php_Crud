<?php
session_start();
require 'db.php';

$id = $_GET['id'];

$select = "SELECT * FROM crud WHERE id=$id";
$select_result = mysqli_query($db_connect, $select);
$after_assoc = mysqli_fetch_assoc($select_result);

if ($after_assoc['status'] == 0) {
    $update_user = "UPDATE crud SET status=1 WHERE id=$id";
    $update_user_result = mysqli_query($db_connect, $update_user);

    $_SESSION['delete'] = 'Record Move Trash Successfully!';
    header('location:trash.php');
} else {
    $update_user = "UPDATE crud SET status=0 WHERE id=$id";
    $update_user_result = mysqli_query($db_connect, $update_user);

    $_SESSION['success'] = 'Record Restore Successfully!';
    header('location:index.php');
}