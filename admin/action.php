<?php
require '../php/connect.php';
$table = $_POST['table'];
$action = $_POST['action'];
$row = $_POST['row'];
$newrow =$_POST['newrow']
$query ="UPDATE $table set $row = '$newrow' where $row = '$row'";
$result=$winatech->query($query) or die($winatech->error.__LINE__);

if ($result) {
	header("Location: edit_record.php?message=".$row." "."Updated successfully");
}