<?php
require 'php/query.php';
require 'php/connect.php';
require 'php/session.php';
require 'php/error.php';
if (isset($_POST['changepassword'])) {
    $oldpassword = md5($_POST['oldpassword']);
    $newpassword =md5($_POST['newpssword']);
    $Auth->getOldPassword($oldpassword,$newpassword);
}
if (isset($_POST['updateprofile'])) {
    $Auth->updateInfo($_POST['department'],$_POST['faculty'],$_POST['level'],$_POST['email']);
}
$Auth->OnlineUsers();
$Auth->logUserOut();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <?php require 'pages/styles.html' ?>
    <link rel="stylesheet" href="assets/css/croppie.css">
    <link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
    <link href="SpryAssets/SpryValidationPassword.css" rel="stylesheet" type="text/css">
    <link href="SpryAssets/SpryValidationConfirm.css" rel="stylesheet" type="text/css">
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationPassword.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationConfirm.js" type="text/javascript"></script>
</head>

<body>
    <?php require 'pages/nav.php' ?>
    <section class="container-wrap">
        <div class="container wrap">
            <div class="row">
                <div class="col-md-4 col">
                    <?php require 'pages/leftside.php' ?>
                </div>
                <div class="col-md-7 col">
                    <?php include "pages/profile_header.php" ?>
                    <div class="gist-status">
                        <h4><i class="fa fa-edit"></i> Edit Profile Information<small><a href="profile.php?user_id=<?php echo $Auth->getUserDetails()['id'] ?>&key=<?php echo md5($Auth->nameOfUser()) ?>"><span class="pull-right">Back to profile <i class="fa fa-arrow-right"></i></span></a></small></h4>
                        <hr>
                        <form action="edit_profile.php" method="post">
                       	    <div class="form-body">
                              	<span id="sprytextfield1">
                                    <input name="email" type="text" class="form-control" id="email" placeholder="Enter E-mail Address" value="<?php echo $Auth->getUserDetails()['email'] ?>">
                                    <span class="textfieldRequiredMsg">Enter Email Addresss.</span><span class="textfieldInvalidFormatMsg">Invalid email format.</span>
                                </span>
                            </div>
                            <div class="form-body">
                                <label for="department">Level</label>
                                <select name="level" class="form-control" id="level">
                                    <option><?php echo $Auth->getUserDetails()['level'] ?></option>
                                    <?php while($rows = $level->fetch_assoc())  : ?>
                                        <option><?php echo $rows['level'] ?></option>
                                    <?php endwhile ?>
                                </select>
                            </div>
                            <div class="form-body">
                                <label for="department">Department</label>
                                <select name="department" class="form-control" id="department">
                                    <option><?php echo $Auth->getUserDetails()['department'] ?></option>
                                    <?php while($rows = $department->fetch_assoc())  : ?>
                                        <option><?php echo $rows['department'] ?></option>
                                    <?php endwhile ?>
                                </select>
                            </div>
                        <div class="form-body">
                            <label for="faculty">Faculty</label>
                            <select name="faculty" class="form-control" id="faculty">
                                <option><?php echo $Auth->getUserDetails()['faculty'] ?></option>
                                <?php while($rows = $faculty->fetch_assoc())  : ?>
                                    <option><?php echo $rows['faculty'] ?></option>
                                <?php endwhile ?>
                              </select>
                        </div>
                        <div class="form-body" style="margin-top: 20px;">
                      	    <button class="btn btn-lg btn-primary" type="submit" name="updateprofile"><i class="fa fa-edit"></i> Update Profile</button>
                        </div>  
                        </form>
                    </div>
                    <div class="gist-status">
                        <h4><i class="fa fa-lock"></i> Change Password<small><a href="profile.php?user_id=<?php echo $Auth->getUserDetails()['id'] ?>&key=<?php echo md5($Auth->nameOfUser()) ?>"><span class="pull-right">Back to profile <i class="fa fa-arrow-right"></i></span></a></small></h4>
                        <hr>
                        <form action="edit_profile.php" method="post">
                            <?php
                                if (!empty($_GET['message'])) {
                                    echo '<div class="alert alert-danger">'.$_GET['message'] .'</div>';    
                                }
                            ?>
                            <div class="form-body">
                              <span id="sprypassword1">
                                <label for="oldpassword">Old Password</label>
                                <input name="oldpassword" type="password" class="form-control" id="oldpassword">
                            	<span class="passwordRequiredMsg">Enter your Old password</span>
                              </span> 
                            </div>
                            <div class="form-body">
                               	<span id="sprypassword2">
                                <label for="newpssword">New Password</label>
                                <input type="password" name="newpssword" id="newpssword" class="form-control">
                                <span class="passwordRequiredMsg">Enter your new password</span><span class="passwordMinCharsMsg">password must be more than six (6) characters.</span><span class="passwordMaxCharsMsg">Password must be less than 18 characters.</span></span> 
                            </div>
                            <div class="form-body">
                                <span id="spryconfirm1">
                                    <label for="confirmpassword">Confirm Password</label>
                                    <input type="password" name="confirmpassword" id="confirmpassword" class="form-control">
                                    <span class="confirmRequiredMsg">Please confirm your password.</span><span class="confirmInvalidMsg">The password does not match your previous password.</span>
                                </span> 
                            </div>
                            <div class="form-body" style="margin-top: 20px;">
                                <button class="btn btn-lg btn-primary" type="submit" name="changepassword"><i class="fa fa-lock"></i> Change Password</button>
                            </div>  
                        </form>
                    </div>
                </div>
            </div>    
        </div>
    </section>
    <?php require 'pages/footer.php'?>
    <?php require 'pages/script.html' ?>
<script type="text/javascript" src="assets/js/croppie.js"></script>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "email", {validateOn:["blur", "change"]});
var sprypassword1 = new Spry.Widget.ValidationPassword("sprypassword1", {validateOn:["blur", "change"]});
var sprypassword2 = new Spry.Widget.ValidationPassword("sprypassword2", {validateOn:["blur", "change"], minChars:6, maxChars:18});
var spryconfirm1 = new Spry.Widget.ValidationConfirm("spryconfirm1", "newpssword", {validateOn:["blur", "change"]});
</script>
</body>
</html>