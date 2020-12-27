<?php
require 'php/connect.php';
require 'php/session.php';
require 'php/error.php';
require 'php/chat.php';
$Auth->OnlineUsers();
$Auth->logUserOut();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inbox</title>
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
                <div class="col-md-7 col">
                    <div class="gist-header">
                        <h4>Message <small><span class="pull-right" style="color: #fff">[<?php echo $inboxcount; ?>]</span></small></h4>
                    </div>
                    <div class="gist-status">
                        <?php if ($inboxcount < 1) : ?> 
                            <h4 class="text-center"><i class="fa fa-frown-o"></i> Sorry you have no messages</h4>
                        <?php endif ?>
                        <?php while($row = $inbox->fetch_assoc()) : ?>
                            <ul>
                                <li>
                                    <?php  if ($row['sender_id'] == $_SESSION['user_id']) : ?>
                                        <a href="chat.php?key=<?php echo md5($Auth->nameofuser())?>&href=<?php echo $row['user_id'] ?>&reciever_id=<?php echo md5($row['sender_id']) ?>&reciever_name=<?php echo $row['sender_name'] ?> ">
                                            <div class="media" style="margin-left: -20px;">
                                                <div class="media-body" >
                                                    <div class="follow-head" style="margin-top: -5px;">
                                                        <div class="col-sm-12">
                                                            <h5><?php echo $row['sender_name'] ?></h5>
                                                            <h5 class="text-left text-muted status-text" style="color: #b6b6b6"><?php echo $row['message'] ?> <small class="pull-right"><?php echo $row['dateposted'] ?> </small></h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    <?php else : ?>
                                        <a href="chat.php?key=<?php echo md5($Auth->nameofuser())?>&href=<?php echo $row['sender_id'] ?>&reciever_id=<?php echo md5($row['sender_id']) ?>&reciever_name=<?php echo $row['sender_name'] ?> ">
                                            <div class="media" style="margin-left: -20px; overflow: hidden;">
                                                <div class="media-body" >
                                                    <div class="follow-head" style="margin-top: -5px;">
                                                        <div class="col-sm-12">
                                                            <h5><?php echo $row['receiver_name'] ?> </h5>
                                                            <h5 class="text-left text-muted status-text" style="color: #b6b6b6"><?php echo $row['message'] ?> <small class="pull-right"><?php echo $row['dateposted'] ?> </small></h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    <?php endif ?>
                                </li>
                            </ul>
                        <?php endwhile ?>
                    </div>
                </div>
            </div>    
        </div>
    </section>
    <?php require 'pages/script.html' ?>
</body>

</html>