<?php
require 'php/connect.php';
require 'php/session.php';
require 'php/error.php';
require 'php/chat.php';
$nameuser = $_GET['key'];
$href = $_GET['href'];
$reciever_id = $_GET['reciever_id'];
$reciever_name = $_GET['reciever_name'];
$user_id =$_SESSION['user_id'];
if ($nameuser != md5($Auth->nameOfUser())) {
    $Error->notFound();
}
$Auth->OnlineUsers();
$Auth->logUserOut();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
    <?php require 'pages/styles.html' ?>
</head>
<body>
    <?php require 'pages/nav.php' ?>
    <section class="container-wrap">
        <div class="container wrap">
            <div class="row">
                <div class="col-md-4 col">
                    <?php require 'pages/leftside.php' ?>
                </div>
                <div class="col-md-6 col">
                    <div class="chat-feed">
                        <div class="gist-header">
                            <h4><a href="message.php" style="color: #fff; margin-right: 10px; text-decoration: none;"><i class="fa fa-arrow-left"></i> </a><?php echo $reciever_name ?></h4>
                        </div>
                        <div class="gist-body">
                            <div class="message-body"></div>
                            
                        </div>
                        <div class="gist-composer">
                            <textarea class="textarea-composer"  cols="20" placeholder="Type your message to <?php echo $reciever_name ?> here!!!" id="text"></textarea>
                            <a href="#" class="btn btn-primary btn-composer" id="sendchat">Send Message</a>
                            <input type="hidden" id="name" value="<?php echo $reciever_name ?>">
                            <input type="hidden" id="reciever_id" value="<?php echo $href ?>">
                            <input type="hidden" name="reciever_name" value="<?php echo $Auth->nameOfUser() ?>">
                        </div>
                        <div class="alert alert-danger" id="errormes2" style="display: none;">Please Type a message to send</div>

                    </div>
                </div>
            </div>    
        </div>
    </section>
    <?php require 'pages/script.html' ?>
</body>
<script type="text/javascript">
    $(document).ready(function()
        {
        $.ajaxSetup({cache:false});
        setInterval(function() {
            $('.message-body').load('load_chat.php?href=<?php echo $href ?>&user_id=<?php echo $user_id ?>');
        }, 500);
    });
</script>
<script type="text/javascript">
    setTimeout(function(){
      $("html, body, .gist-body").animate({ scrollTop: 400000 }, 500);
    },2000);
</script>

</html>