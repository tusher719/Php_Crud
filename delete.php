<?php
session_start();
require 'db.php';

$id = $_GET['id'];

$delete_crud = "DELETE FROM crud WHERE id=$id";
$delete_todo_result = mysqli_query($db_connect, $delete_crud);

$_SESSION['delete'] = "Record Delete Permanently Successfully!";
header('location:trash.php?');