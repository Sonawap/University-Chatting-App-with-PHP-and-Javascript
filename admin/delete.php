<?php
require '../php/connect.php';

$table = $_GET['table'];
$row = $_GET['row'];

$query = "DELETE FROM $table where $table ='$row'";
$result=$winatech->query($query) or die($winatech->error.__LINE__);

if ($result) {
    header("Location: edit_record.php?message=Record Deleted Succesfully");
}else{
    header("Location: edit_record.php?errormessage=Sorry an error occured");
}