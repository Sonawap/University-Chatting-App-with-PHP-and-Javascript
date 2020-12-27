<?php
error_reporting(0);
require 'php/connect.php';
require 'php/session.php';
$Auth->OnlineUsers();
$Auth->logUserOut();
$department = $Auth->getUserDetails()['department'];
$query = "SELECT * FROM users where department = '$department' ORDER BY id DESC LIMIT 4 ";
$mem=$winatech->query($query) or die($winatech->error.__LINE__);
$memcount=$mem->num_rows;

$faculty = $Auth->getUserDetails()['faculty'];
$queryfa = "SELECT * FROM users where faculty = '$faculty' ORDER BY id DESC LIMIT 4 ";
$memfa=$winatech->query($queryfa) or die($winatech->error.__LINE__);
$memfacount=$memfa->num_rows;

$level = $Auth->getUserDetails()['level'];
$queryle = "SELECT * FROM users where level = '$level' ORDER BY id DESC LIMIT 4 ";
$memle=$winatech->query($queryle) or die($winatech->error.__LINE__);
$memlecount=$memle->num_rows;

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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
                    <div class="gist-status">
                        <div class="row" style="margin: 0px;">
                            <h4>Lastest Members from <?php echo $Auth->getUserDetails()['department']; ?> Department </h4>
                            <hr>
                            <?php if ($memcount < 1) : ?> 
                                <h4 class="text-center"><i class="fa fa-frown-o"></i> Sorry no other user is found</h4>
                            <?php endif ?>
                            <?php while($row = $mem->fetch_assoc()) : ?>
                                <div class="col-md-3">
                                    <a  href="view_profile.php?user_id=<?php echo $row['id'] ?>&key=<?php echo md5($row['firstname']) ?>">
                                        <div class="thumbnaili" style="border: none;"><img src="images/profile_pic/<?php echo $row['profile_pic'] ?>" class="img-circle"  width="140" height="140">
                                            <div class="caption">
                                                <h5 class="text-center"><?php echo $row['firstname'] ?></h5>
                                                <p class="text-center"><?php echo $row['email'] ?></p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php endwhile ?>
                        </div>
                    </div>

                    <div class="gist-status">
                        <div class="row" style="margin: 0px;">
                            <h4>Lastest Members from <?php echo $Auth->getUserDetails()['faculty']; ?> Faculty </h4>
                            <hr>
                            <?php if ($memfacount < 1) : ?> 
                                <h4 class="text-center"><i class="fa fa-frown-o"></i> Sorry no other user is found</h4>
                            <?php endif ?>
                            <?php while($row = $memfa->fetch_assoc()) : ?>
                                <div class="col-md-3">
                                    <a  href="view_profile.php?user_id=<?php echo $row['id'] ?>&key=<?php echo md5($row['firstname']) ?>">
                                        <div class="thumbnaili" style="border: none;"><img src="images/profile_pic/<?php echo $row['profile_pic'] ?>" class="img-circle"  width="140" height="140">
                                            <div class="caption">
                                                <h5 class="text-center"><?php echo $row['firstname'] ?></h5>
                                                <p class="text-center"><?php echo $row['email'] ?></p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php endwhile ?>
                        </div>
                    </div>

                    <div class="gist-status">
                        <div class="row" style="margin: 0px;">
                            <h4>Lastest Members from <?php echo $Auth->getUserDetails()['level']; ?></h4>
                            <hr>
                            <?php if ($memlecount < 1) : ?> 
                                <h4 class="text-center"><i class="fa fa-frown-o"></i> Sorry no other user is found</h4>
                            <?php endif ?>
                            <?php while($row = $memle->fetch_assoc()) : ?>
                                <div class="col-md-3">
                                    <a  href="view_profile.php?user_id=<?php echo $row['id'] ?>&key=<?php echo md5($row['firstname']) ?>">
                                        <div class="thumbnaili" style="border: none;"><img src="images/profile_pic/<?php echo $row['profile_pic'] ?>" class="img-circle"  width="140" height="140">
                                            <div class="caption">
                                                <h5 class="text-center"><?php echo $row['firstname'] ?></h5>
                                                <p class="text-center"><?php echo $row['email'] ?></p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php endwhile ?>
                        </div>
                    </div>
                </div>
            </div>    
        </div>
    </section>
    <?php require 'pages/footer.php'?>
    <?php require 'pages/script.html' ?>
</body>

</html>