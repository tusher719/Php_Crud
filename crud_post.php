<?php
session_start();
    require 'db.php';

    date_default_timezone_set('Asia/Dhaka');
    $created_at = date('d-m-y h:i:s');

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];

if (empty($name)) {
    $_SESSION['name_err'] = 'Please Enter name!';
    header('location:add.php');
} elseif (empty($email)) {
    $_SESSION['email_err'] = "Please Enter Email!";
    header('location:add.php');
} elseif (empty($phone)) {
    $_SESSION['phone_err'] = "Please Enter Phone!";
    header('location:add.php');
} elseif (empty($dob)) {
    $_SESSION['dob_err'] = "Please Enter Date of birth!";
    header('location:add.php');
} elseif (empty($gender)) {
    $_SESSION['gender_err'] = "Please Select Gender!";
    header('location:add.php');
} else {
    $insert = "INSERT INTO crud (name, email, phone, gender, dob, created_at) VALUES ('$name', '$email', '$phone', '$gender', '$dob', '$created_at')";
    $insert_result = mysqli_query($db_connect, $insert);

    $_SESSION['success'] = "Record Added Successfully!";
    header('location:index.php');
}


?>