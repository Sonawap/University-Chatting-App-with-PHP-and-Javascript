<?php
require "php/connect.php";
require "php/chat.php";
$text = $_REQUEST['text'];
$name = $_REQUEST['name'];
$Chat->sendMessage($text,$name);


