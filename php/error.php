<?php
Class ErrorMessage{
	public static function notFound(){
		header("Location: pages/404.php");
	} 
}

$Error = new ErrorMessage;