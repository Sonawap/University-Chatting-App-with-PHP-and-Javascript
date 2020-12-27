<?php
session_start();
class ChatMessage{
	public $sender_id;
	public $receiver_id;
	public $text;

	public static function sendMessage($text,$name){
		require 'connect.php';
		$user_id = $_SESSION['user_id'];
		$datep = date("g:i A d M Y");
		$query = "INSERT INTO chat (user_id,user_name,message,dateposted) values ('$user_id','$name','$text','$datep')";
  		$sendMessage = $winatech->query($query) or die($winatech->error.__LINE__);
	}
	public static function sendDm($reciever_id, $text){
		require 'connect.php';
		$sender_id = $_SESSION['user_id'];
		$datep = date("g:i A d M Y");
		$query = "INSERT INTO DM (sender_id,reciever_id,message,dateposted) values ('$sender_id','$reciever_id','$text','$datep')";
  		$sendMessage = $winatech->query($query) or die($winatech->error.__LINE__);
	}

	public static function UpdateInbox($reciever_id,$name,$receiver_name,$text){
		require 'connect.php';
		$user_id = $_SESSION['user_id'];
		$time = time();
		$datep = date("g:i A d M Y");
		$querycount = "SELECT * FROM inbox where (user_id = '$reciever_id'  and  sender_id ='$user_id') or (sender_id = '$reciever_id'  and  user_id ='$user_id') ";
		$count = $winatech->query($querycount) or die($winatech->error.__LINE__);
		$inbox_count = $count->num_rows;
		if ($inbox_count > 0) {
			$query = "UPDATE inbox SET message = '$text', time = '$time' where (user_id = '$reciever_id'  and  sender_id ='$user_id') or (sender_id = '$reciever_id'  and  user_id ='$user_id')  ";
			$sendMessage = $winatech->query($query) or die($winatech->error.__LINE__);
		}else{
			$query = "INSERT INTO inbox (user_id,sender_id,sender_name,receiver_name,message,dateposted,time) values ('$reciever_id','$user_id','$name','$receiver_name','$text','$datep','$time')";
  			$sendMessage = $winatech->query($query) or die($winatech->error.__LINE__);
  		}
	}

	public static function getMessage(){
		require 'connect.php';
		$query = "SELECT * FROM chat";
		$chat = $winatech->query($query) or die($winatech->error.__LINE__);
		return $chat;
	}
	public function flow($user_id){
		if ($_SESSION['user_id'] == $user_id) {
			return $flow = "reciever";
		}
	}
}
require 'connect.php';
$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM chat";
$chat = $winatech->query($query) or die($winatech->error.__LINE__);

$query = "SELECT * FROM inbox where user_id = '$user_id' or sender_id = '$user_id' ORDER BY time DESC ";
$inbox = $winatech->query($query) or die($winatech->error.__LINE__);
$inboxcount = $inbox->num_rows;

$Chat = new ChatMessage;

