<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <link rel="stylesheet" href="asset/css/style.css">
</head>
<body>

<?php
// Database
require 'db.php';

// select query
$crud = "SELECT * FROM crud WHERE status=0";
$home_result = mysqli_query($db_connect, $crud);

// Soft delete data count
$soft_delete = "SELECT * FROM crud WHERE status=1";
$soft_delete_total = mysqli_query($db_connect, $soft_delete);
?>