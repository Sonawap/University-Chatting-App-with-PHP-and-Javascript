<?php
session_start();
require '../php/connect.php';
require '../php/query.php';
$faculty =$_GET['faculty'];

if (isset($_POST['submitlevel'])) {
    $newrow =$_POST['faculty'];
    $faculty = $_POST['getfaculty'];
    $query ="UPDATE faculty SET faculty='$newrow' WHERE faculty = '$faculty'";
    $result=$winatech->query($query) or die($winatech->error.__LINE__);

    if ($result) {
        header("Location: edit_faculty.php?message=Level Updated successfully&faculty=".$newrow);
    }else{
        header("Location: edit_faculty.php?errormessage=Sorry an error occured&faculty=".$newrow);
    }
}


?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Faculty</title>
    <link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
    <?php require 'pages/styles.html' ?>
    <script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
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
                        <h4>Edit Faculty <small><span class="pull-right"><a href="edit_record.php"> Back to Record <i class="fa fa-arrow-right"></i> </a></span></small></h4>
                        <hr>
                        <div class="form-group">
                            <form action="edit_faculty.php" method="post">
                                <div class="form-group cen">
                                    <span id="sprytextfield1">
                                        <div class="input-group">
                                          <input class="form-control" type="text" name="faculty" placeholder="Type new Faculty name" value="<?php echo $faculty ?>">
                                          <input type="hidden" name="getfaculty" value="<?php echo$faculty ?>">
                                          <div class="input-group-btn">
                                            <button class="btn btn-primary" type="submit" name="submitlevel"><i class="fa fa-edit"></i> Update Faculty</button>
                                            </div>
                                        </div>
                                    <span class="textfieldRequiredMsg">Enter Faculty.</span></span>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>    
        </div>
    </section>
    <?php require '../pages/script.html' ?>
    <script type="text/javascript">
        var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none", {validateOn:["blur", "change"]});
        var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "none", {validateOn:["blur", "change"]});
        var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "none", {validateOn:["blur", "change"]});
    </script>
</body>

</html>