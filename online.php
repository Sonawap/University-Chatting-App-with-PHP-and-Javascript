<?php
require 'php/connect.php';
require 'php/session.php';
require 'php/error.php';
$Auth->OnlineUsers();
$Auth->logUserOut();
$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM user_online where user_id != $user_id";
$online = $winatech->query($query) or die($winatech->error.__LINE__);
$onlinecount = $online->num_rows;
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Users</title>
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
                        <h4>Online User <small><span style="color: #fff"> [<?php echo $onlinecount; ?>]</span></small></h4>
                    </div>
                    <div class="gist-status">
                        <?php if ($onlinecount < 1) : ?> 
                            <h4 class="text-center"><i class="fa fa-frown-o"></i> Sorry no other user is online</h4>
                        <?php endif ?>
                        <?php while($row = $online->fetch_assoc()) : ?>
                            <ul>
                                <li>
                                    <a  href="view_profile.php?user_id=<?php echo $row['user_id'] ?>&key=<?php echo md5($row['name']) ?>">
                                        <div class="media" style="margin-left: -20px;">
                                            <div class="media-body" >
                                                <div class="follow-head" style="margin-top: -5px;">
                                                    <div class="col-sm-12">
                                                        <h5><i class="fa fa-circle" style="color: green; font-size: 12px;"></i> <?php echo $row['name'] ?> </h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
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