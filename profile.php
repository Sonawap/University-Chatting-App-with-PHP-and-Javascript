<?php
require 'php/connect.php';
require 'php/session.php';
$Auth->OnlineUsers();
$Auth->logUserOut();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $Auth->nameOfUser() ?>'s Profile</title>
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
                    <?php include "pages/profile_header.php" ?>  
                    <?php
                        if (!empty($_GET['message'])) {
                            echo '<div class="alert alert-info">'.$_GET['message'] .'</div>';    
                        }
                    ?> 
                    <?php
                        if (!empty($_GET['errormessage'])) {
                            echo '<div class="alert alert-danger">'.$_GET['message'] .'</div>';    
                        }
                    ?>       
                    <div class="gist-status">
                        <h4>Profile Information<small><a href="edit_profile.php"><span class="pull-right"><i class="fa fa-edit"></i> Edit Profile</span></a></small></h4>
                        <hr>
                        <h4><?php echo $Auth->nameOfUser() ?></h4>
                        <h5>Study <?php echo $Auth->getUserDetails()['department'] ?></h5>
                        <h5>Faculty of <?php echo $Auth->getUserDetails()['faculty'] ?></h5>
                        <h5>Level : <?php echo $Auth->getUserDetails()['level'] ?></h5>
                        <h5>E-mail address : <?php echo $Auth->getUserDetails()['email'] ?></h5>
                        <h5>Joined on <?php echo $Auth->getUserDetails()['dateposted'] ?></h5>
                    </div>
                </div>
            </div>    
        </div>
    </section>
    <?php require 'pages/script.html' ?>
</body>
</html>