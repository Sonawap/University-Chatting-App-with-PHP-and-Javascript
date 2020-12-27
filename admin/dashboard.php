<?php
session_start();
require '../php/connect.php';
$admin_id = $_SESSION['user_id'];
$query = "SELECT * FROM users where id != '$admin_id' ORDER BY id DESC LIMIT 36 ";
$result=$winatech->query($query) or die($winatech->error.__LINE__);
$resultcount=$result->num_rows;

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
                    <?php
                        if (!empty($_GET['message'])) {
                            echo '<div class="alert alert-info">'.$_GET['message'] .'</div>';    
                        }
                    ?>
                    <div class="gist-status">
                        <div class="row" style="margin: 0px;">
                            <h4>Lastest Members <small><span class="pull-right">Total members <?php echo $resultcount ?></span></small> </h4>
                            <hr>
                            <?php if ($resultcount < 1) : ?> 
                                <h4 class="text-center"><i class="fa fa-frown-o"></i> Sorry no other user is found</h4>
                            <?php endif ?>
                            <?php while($row = $result->fetch_assoc()) : ?>
                                <div class="col-md-2">
                                    <a  href="admin_view_profile.php?user_id=<?php echo $row['id'] ?>">
                                        <div class="thumbnaili" style="border: none;"><img src="../images/profile_pic/<?php echo $row['profile_pic'] ?>" class="img-circle"  width="80" height="80">
                                            <div class="caption">
                                                <h5 class="text-center"><?php echo $row['firstname'] ?></h5>
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
    <?php require '../pages/script.html' ?>
</body>

</html>