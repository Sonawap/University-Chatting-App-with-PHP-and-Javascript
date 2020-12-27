<?php

require 'php/connect.php';
require 'php/session.php';
require 'php/error.php';
require 'php/chat.php';
$chatroom = $_GET['Chatroom'];
$chat_type = $_GET['chat_type'];
if ($chat_type != "room") {
    $Error->notFound();
}
if ($_GET['key'] != md5($chatroom)) {
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
    <title>Chatroom</title>
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
                            <h4>Chat Room</h4>
                            <div id="gist-body"></div>
                        </div>
                        <div class="gist-body">
                            <div class="room-body"></div>
                            
                        </div>
                        <div class="gist-composer">
                            <textarea class="textarea-composer"  cols="20" placeholder="Type your message here" id="text"></textarea>
                            <a href="#" class="btn btn-primary btn-composer" id="sendmessage">Send Message</a>
                            <input type="hidden" id="name" value="<?php echo ($Auth->nameOfUser()) ?>">
                        </div>
                        <div class="alert alert-danger" id="errormes2" style="display: none;">Please Type a message to send</div>

                    </div>
                </div>
            </div>    
        </div>
    </section>
    <?php require 'pages/script.html' ?>
    <script type="text/javascript">
        setTimeout(function(){
          $("html, body, .gist-body").animate({ scrollTop: 400000 }, 500);
        },2000);
    </script>
</body>

</html>