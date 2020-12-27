<?php
require "php/connect.php";
require "php/chat.php";
require "php/session.php";
$text = $_REQUEST['text'];
$name = $_REQUEST['name'];
$reciever_id = $_REQUEST['reciever_id'];
$Chat->sendDm($reciever_id,$text);
$Chat->UpdateInbox($reciever_id,$name,$Auth->nameOfUser(),$text);


