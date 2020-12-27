<?php
error_reporting(0);
session_start();
class AuthUser{
	public $user_id;

	public static function logUserOut(){
		require 'connect.php';
		if (empty($_SESSION['user_id'])) {
			session_destroy();
			header("Location: index.php");
		}
		$user_id =$_SESSION['user_id'];
		$query = "SELECT * FROM users where id = '$user_id' and active ='0'";
		$result = $winatech->query($query) or die($winatech->error.__LINE__);
		$count = $result->num_rows;
		if ($count > 0) {
			session_destroy();
			header("Location: login.php?message=Your account has been disactivated, contact administrator for instrutions");
		}
	}
	public function getAuthUser(){
		require 'connect.php';
		$this->user_id = $_SESSION['user_id'];
		$query = "SELECT * FROM users where id == $this->user_id  ";
		$result = $winatech->query($query) or die($winatech->error.__LINE__);
		$getUser = $result->num_rows;
		return $getUser;
	}

	public function getOldPassword($password,$newpassword){
		require 'connect.php';
		$user_id = $_SESSION['user_id'];
		$query = "SELECT * FROM users where id = '$user_id' and password = '$password'  ";
		$result = $winatech->query($query) or die($winatech->error.__LINE__);
		$countpassword = $result->num_rows;
		if ($countpassword > 0) {
			$query1 = "UPDATE users SET password = '$newpassword' where id = $user_id ";
			$sendMessage = $winatech->query($query1) or die($winatech->error.__LINE__);
			if ($sendMessage) {
				header("Location: profile.php?message=Password Changed Successfully");
			}else{
				header("Location: edit_profile.php?message=Sorry an error occur, try again");
			}
		}else{
			header("Location: edit_profile.php?message=Password Error");
		}
	}

	public function updateInfo($department,$faculty,$level,$email){
		require 'connect.php';
		$this->user_id = $_SESSION['user_id'];
		$queryw = "UPDATE users SET department = '$department', faculty = '$faculty', level='$level', email='$email' where id = $this->user_id ";
		$sendMessage = $winatech->query($queryw) or die($winatech->error.__LINE__);
		if ($sendMessage) {
			header("Location: profile.php?message=Profile information Updated");
		}else{
			header("Location: profile.php?errormessage=Sorry an error occur, try again");
		}
	}

	public function checkAuthUser(){
		if (!empty($_SESSION['user_id'])) {
			return true;
		}
	}

	public function loginUser($email,$password){
		require 'connect.php';
		$query ="SELECT * FROM users where email='$email' and password = '$password' ";
		$result = $winatech->query($query) or die($winatech->error.__LINE__);
		$getUser2 = $result->num_rows;
		if ($getUser2 < 1) {
			header("Location: login.php?error=Authentication failed");
		}
		if($rows=mysqli_fetch_array($result)){
			if ($rows['active'] == 0) {
				header("Location: login.php?message=Your account has been disactivated, contact administrator for instrutions");	
			}else{
				$query = "SELECT * FROM users where email = '$email' and password = '$password' ";
				$result = $winatech->query($query) or die($winatech->error.__LINE__);
				$getUser = $result->num_rows;
				if ($getUser >= 1){
					if($row=mysqli_fetch_array($result)){
						$_SESSION['user_id']=$row["id"];
						if ($row['account_type'] == 'admin') {
							header("Location: admin/dashboard.php");		
						}
						else{
							header("Location: dashboard.php?message=success".md5($_SESSION['user_id']));
						}
					}
				}
			}
		}
	}

	public function getUserDetails(){
		require 'connect.php';
		$this->user_id = $_SESSION['user_id'];
		$query = "SELECT * FROM users where id='$this->user_id'";
		$result = $winatech->query($query) or die($winatech->error.__LINE__);
		return $rows = mysqli_fetch_array($result);
	}
	public function viewUserProfile($user_id){
		require 'connect.php';
		if ($user_id == $_SESSION['user_id']) {
			header("Location: profile.php?user_id=".$this->getUserDetails()['id']."&key=".md5($this->nameOfUser())."");
		}
		$query = "SELECT * FROM users where id = $user_id";
		$result = $winatech->query($query) or die($winatech->error.__LINE__);
		$getUser = $result->num_rows;
		if ($getUser < 1) {
			header("Location: pages/404.php");
		}else{
			return $rows = mysqli_fetch_array($result);
		}
	}
	public function first(){
		return $this->getUserDetails()['firstname'];
	}

	public function nameOfUser(){
		return $this->getUserDetails()['firstname']. ' ' . $this->getUserDetails()['othername'];
	}
	public function profile_pic(){
		return $this->getUserDetails()['profile_pic'];
	}
	public function logout(){
		session_destroy();
		header("Location: index.php");
		exit();
	}
	public function onlineUsers(){
		require 'connect.php';
		$name = $this->getUserDetails()['firstname']. ' ' . $this->getUserDetails()['othername'];
		$profile_pic =  $this->getUserDetails()['profile_pic'];
		$user_id = $_SESSION['user_id'];
		$session=session_id();
		$time=time();
		$time_check=$time-600; //SET TIME 10 Minute


		$sql="SELECT * FROM user_online WHERE session='$session'";
		$result5=$winatech->query($sql) or die($winatech->error.__LINE__);
		$count=$result5->num_rows;
		if($count < 1){
			$sql1="INSERT INTO user_online(session,user_id,name,profile_pic,time)VALUES('$session','$user_id','$name','$profile_pic','$time')";
			$result1=$winatech->query($sql1) or die($winatech->error.__LINE__);
		}
		else {
			$sql2="UPDATE user_online SET time='$time' WHERE session = '$session'";
			$result2=$winatech->query($sql2) or die($winatech->error.__LINE__);
		}
		// if over 10 minute, delete session
		$sql4="DELETE FROM user_online WHERE time<$time_check";
		$result4=$winatech->query($sql4) or die($winatech->error.__LINE__);
	}

	public function checkUser($user_id){
		require 'connect.php';
		$query = "SELECT * FROM users where id='$user_id'";
		$result=$winatech->query($query) or die($winatech->error.__LINE__);
		$usercount=$result->num_rows;
		return $usercount;
	}
}

$Auth = new AuthUser;
