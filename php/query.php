<?php
require 'connect.php';


$query = "SELECT * FROM department ";
$department = $winatech->query($query) or die($winatech->error.__LINE__);

$query = "SELECT * FROM level ";
$level = $winatech->query($query) or die($winatech->error.__LINE__);

$query = "SELECT * FROM faculty ";
$faculty = $winatech->query($query) or die($winatech->error.__LINE__);