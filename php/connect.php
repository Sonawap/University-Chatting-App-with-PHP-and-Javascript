<?php
$db_host = 'localhost';
$db_name = 'messaging';
$db_user = 'root';
$db_password = '';
$winatech = new mysqli($db_host, $db_user, $db_password, $db_name);
if ($winatech->connect_error) {
	printf("Connection failed: %s\n", $winatech->connect_error);
	exit();
}
