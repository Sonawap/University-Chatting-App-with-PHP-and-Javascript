<?php
require 'php/connect.php';
require 'php/session.php';
$Auth->OnlineUsers();
$Auth->logUserOut();
if (isset($_POST['submit'])) {
    $image_type=$_FILES['pic']['name'];
    $type = $_FILES['pic']['name'];
    if($image_type==""){
        $status_message = 'Select Image first';
        header("Location: profile_photo.php?message=".$status_message);
        exit();
        }
        $image_format = "image/jpeg";
        if($_FILES['pic']['type'] != $image_format)
        {
        //header("location:joinus.php?m=NOTICE:Uploaded file not image");
            $status_message = 'File not image';
            header("Location: profile_photo.php?message=".$status_message);
        exit();
    }

    if ($_FILES['pic']['size'] >10000000 ){
         //300,000=300kb
                $status_message = 'File too large';
               header("Location: profile_photo.php?message=".$status_message);
        exit();
    }else
        {
        $temp_file = $_FILES['pic']['tmp_name'];
        $destination = 'images/profile_pic'."/".$_FILES['pic']['name'];
        move_uploaded_file($temp_file,$destination);
        $pic=$_FILES['pic']['name'];
        $user_idd = $_SESSION['user_id'];
        $query = "UPDATE users set profile_pic = '$pic' where id = $user_idd ";
        $insert_user_choice = $winatech->query($query) or die($winatech->error.__LINE__);
        if ($insert_user_choice) {
            $status_message = "Photo Successfully Added to Gallery";
            header("Location: profile_photo.php?messagesu=".$status_message);
        }else{
            $status_message = "Sorry an error occur try again";
            header("Location: profile_photo.php?message=".$status_message);
        }
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <link rel="stylesheet" href="assets/css/croppie.css">
    <script type="text/javascript" src="assets/js/croppie.js"></script>
    <?php require 'pages/styles.html' ?>
</head>

<body>
    <?php require 'pages/nav.php' ?>
    <section class="container-wrap">
        <div class="container wrap">
            <div class="row">
                <div class="col-md-8 col col-md-offset-2">
                    <div class="gist-status">
                        <h4><i class="fa fa-image"></i> Change Profile Picture<small><a href="profile.php?user_id=<?php echo $Auth->getUserDetails()['id'] ?>&key=<?php echo md5($Auth->nameOfUser()) ?>"><span class="pull-right">Back to profile <i class="fa fa-arrow-right"></i></span></a></small></h4>
                        <div class="row">
                            <hr>
                            <?php
                                if (!empty($_GET['message'])) {
                                    echo '<div class="alert alert-danger">'.$_GET['message'] .'</div>';    
                                }
                            ?>
                            <?php
                                if (!empty($_GET['messagesu'])) {
                                    echo '<div class="alert alert-info">'.$_GET['messagesu'] .'</div>';    
                                }
                            ?> 
                            <div class="col-md-4">
                                <div class="img-wrap">
                                    <img src="images/profile_pic/<?php echo $Auth->profile_pic() ?>" height=250 width=100%>
                                </div>
                            </div>
                            <div class="col-md-4" style="justify-content: center; text-align: center;">
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="form-body" style="margin-top: 50px;">
                                        <label for="pp" class="ppwrap">Select Image</label>
                                        <input type="file" name="pic" style="display: none;" id="pp"><br>
                                        <button type="submit" name="submit" class="btn btn-primary" style="width: 100%">Upload Image</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>    
        </div>
    </section>
    <?php require 'pages/footer.php'?>
    <?php require 'pages/script.html' ?>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none", {validateOn:["blur", "change"]});
</script>
</body>

</html>