<?php
require 'php/connect.php';
require 'php/session.php';
$user_id = $_GET['user_id'];
$Auth->OnlineUsers();
$Auth->logUserOut();

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Profile</title>
    <?php require 'pages/styles.html' ?>
    <link rel="stylesheet" href="assets/css/croppie.css">
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
                        <div class="media status-head">
                            <div class="media-left">
                                <a><img class="status-image" src="images/profile_pic/<?php echo $Auth->viewUserProfile($user_id)['profile_pic'] ?>" width="100" height="100"></a>
                            </div>
                            <div class="media-body">
                                <div class="follow-head">
                                    <div class="col-sm-12">
                                        <h4><?php echo $Auth->viewUserProfile($user_id)['firstname'] ?> <?php echo $Auth->viewUserProfile($user_id)['othername'] ?><small><span class="pull-right"><a href="send_message.php?user_id=<?php echo $Auth->viewUserProfile($user_id)['id'] ?>&key=<?php echo md5($Auth->viewUserProfile($user_id)['id']) ?>" class="btn btn-primary"><i class="fa fa-comment"></i> Send message</a></span></small> </h4>
                                        <h5 class="text-left text-muted status-text"><?php echo $Auth->viewUserProfile($user_id)['email'] ?></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                    <div class="gist-status">
                        <h4>Profile Information</h4>
                        <hr>
                        <h4><?php echo $Auth->viewUserProfile($user_id)['firstname'] . " " .  $Auth->viewUserProfile($user_id)['othername'] ?></h4>
                        <h5>Study <?php echo $Auth->viewUserProfile($user_id)['department'] ?></h5>
                        <h5>Faculty of <?php echo $Auth->viewUserProfile($user_id)['faculty'] ?></h5>
                        <h5>Level : <?php echo $Auth->viewUserProfile($user_id)['level'] ?></h5>
                        <h5>E-mail address : <?php echo $Auth->viewUserProfile($user_id)['email'] ?></h5>
                        <h5>Joined on <?php echo $Auth->viewUserProfile($user_id)['dateposted'] ?></h5>
                    </div>
                </div>
            </div>    
        </div>
    </section>
    <?php require 'pages/script.html' ?>
    <script type="text/javascript" src="assets/js/croppie.js"></script>
</body>
</html>