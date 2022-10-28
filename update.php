<?php
session_start();
require 'db.php';

$id = $_POST['crud_id'];

date_default_timezone_set('Asia/Dhaka');
$updated_at = date('d-m-y h:i:s');

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];

$update = "UPDATE crud SET name='$name', email='$email', phone='$phone', gender='$gender', dob='$dob', updated_at='$updated_at' WHERE id=$id";
$update_result = mysqli_query($db_connect, $update);

$_SESSION['success'] = "Record Update Successfully!";
header('location:index.php');

