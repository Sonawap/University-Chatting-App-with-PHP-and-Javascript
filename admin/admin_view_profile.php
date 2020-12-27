<?php
require '../php/connect.php';
require '../php/session.php';
$user_id = $_GET['user_id'];
$Auth->OnlineUsers();
$Auth->logUserOut();
if (isset($_POST['dis'])) {
    $user_id = $_POST['user_id'];
    $query = "UPDATE users set active ='0' where id = '$user_id' ";
    $result = $result=$winatech->query($query) or die($winatech->error.__LINE__);
    if ($result) {
        header("Location: admin_view_profile.php?message=Account Successfully Disactivated&user_id=".$user_id);
    }else{
        header("Location: admin_view_profile.php?errormessage=Sorry an error occured&user_id=".$user_id);
    }
}

if (isset($_POST['acc'])) {
    $user_id = $_POST['user_id'];
    $query = "UPDATE users set active ='1' where id = '$user_id' ";
    $result = $result=$winatech->query($query) or die($winatech->error.__LINE__);
    if ($result) {
        header("Location: admin_view_profile.php?message=Account As been Re-activated&user_id=".$user_id);
    }else{
        header("Location: admin_view_profile.php?errormessage=Sorry an error occured&user_id=".$user_id);
    }
}
$query ="SELECT * FROM users where id='$user_id' and active = '0'  ";
$result = $winatech->query($query) or die($winatech->error.__LINE__);
$getUser = $result->num_rows;

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
                        <div class="media status-head">
                            <div class="media-left">
                                <a><img class="status-image" src="../images/profile_pic/<?php echo $Auth->viewUserProfile($user_id)['profile_pic'] ?>" width="100" height="100"></a>
                            </div>
                            <div class="media-body">
                                <div class="follow-head">
                                    <div class="col-sm-12">
                                        <h4><?php echo $Auth->viewUserProfile($user_id)['firstname'] ?> <?php echo $Auth->viewUserProfile($user_id)['othername'] ?>
                                        <small>
                                            <span class="pull-right">
                                                <?php if ($getUser < 1) : ?>
                                                    <form method="post" action="admin_view_profile.php">
                                                        <input type="hidden" name="user_id" value="<?php echo $Auth->viewUserProfile($user_id)['id'] ?>">
                                                        <button type="submit" class="btn btn-danger" name="dis">Disactivate Account</button>
                                                    </form>

                                                <?php elseif($getUser > 0) : ?>
                                                    <form method="post" action="admin_view_profile.php">
                                                        <input type="hidden" name="user_id" value="<?php echo $Auth->viewUserProfile($user_id)['id'] ?>">
                                                        <button type="submit" class="btn btn-primary" name="acc">Re-activate Account</button>
                                                    </form>
                                                <?php endif ?>
                                            </span>
                                        </small>
                                        </h4>
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