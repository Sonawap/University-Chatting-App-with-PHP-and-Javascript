<?php
require 'php/connect.php';
require 'php/session.php';
require 'php/error.php';
require 'php/chat.php';
$user_id = $_GET['user_id'];
$name = $Auth->viewUserProfile($user_id)['firstname'] . " " . $Auth->viewUserProfile($user_id)['othername'];
$Auth->OnlineUsers();
$Auth->logUserOut();
if ($Auth->checkUser($user_id) < 1){
    $Error->notFound();
}
if (isset($_POST['sendmessage'])) {
    $Chat->sendDm($Auth->viewUserProfile($user_id)['id'],$_POST['message']);
    $Chat->UpdateInbox($Auth->viewUserProfile($user_id)['id'],$name,$Auth->nameOfUser(),$_POST['message']);
    header("Location: chat.php?key=".md5($Auth->nameofuser())."&href=".$user_id."&reciever_id=".md5($user_id)."&reciever_name=".$name );
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Message</title>
    <?php require 'pages/styles.html' ?>
    <link rel="stylesheet" href="assets/css/croppie.css">
    <link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
    <link href="SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css">
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationTextarea.js" type="text/javascript"></script>
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
                    <div class="gist-status">
                        <h4>Send Message to <?php echo $Auth->viewUserProfile($user_id)['firstname'] . " " .  $Auth->viewUserProfile($user_id)['othername'] ?><small><span class="pull-right"><a href="view_profile.php?user_id=<?php echo $Auth->viewUserProfile($user_id)['id'] ?>&key=<?php echo md5($Auth->viewUserProfile($user_id)['id']) ?>">Back to <?php echo $name ?> Profile <i class="fa fa-arrow-right"></i></a></span></small> </h4>
                        <hr>
                        <form action="send_message.php?user_id=<?php echo $Auth->viewUserProfile($user_id)['id'] ?>" method="post">
                            <div class="form-body">
                           	    <span id="sprytextarea1">
                                	<label for="message">Message</label>
                                	<textarea name="message" id="message" class="form-control" style="resize: none; height: 180px"></textarea>
                               	    <span class="textareaRequiredMsg">Type a message</span>
                                </span> 
                           </div>
                           <div class="form-body">
                               <button class="btn btn-primary" type="submit" name="sendmessage">Send message</button>
                           </div>
                      </form>
                    </div>
                </div>
            </div>    
        </div>
    </section>
    <?php require 'pages/script.html' ?>
<script type="text/javascript" src="assets/js/croppie.js"></script>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none", {validateOn:["blur", "change"]});
var sprytextarea1 = new Spry.Widget.ValidationTextarea("sprytextarea1", {validateOn:["blur", "change"]});
</script>
</body>
</html>