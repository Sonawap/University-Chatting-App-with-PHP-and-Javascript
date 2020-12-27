<?php
session_start();
require '../php/connect.php';
require '../php/query.php';
$admin_id = $_SESSION['user_id'];

if (isset($_POST['submitlevel'])) {
    $level = $_POST['level'];
    $query = "INSERT INTO level (level) values ('$level')";
    $result = $winatech->query($query) or die($winatech->error.__LINE__);
    if ($result) {
        header("Location: add_record.php?message=Level Successfully Added");
    }else{
        header("Location: add_record.php?errormessage=Sorry an error occured");
    }
}

if (isset($_POST['submitfaculty'])) {
    $faculty = $_POST['faculty'];
    $query = "INSERT INTO faculty (faculty) values ('$faculty')";
    $result = $winatech->query($query) or die($winatech->error.__LINE__);
    if ($result) {
        header("Location: add_record.php?message=Faculty Successfully Added");
    }else{
        header("Location: add_record.php?errormessage=Sorry an error occured");
    }
}

if (isset($_POST['submitdepartment'])) {
    $faculty = $_POST['depfaculty'];
    $department = $_POST['department'];
    $query = "INSERT INTO department (department,faculty) values ('$department','$faculty')";
    $result = $winatech->query($query) or die($winatech->error.__LINE__);
    if ($result) {
        header("Location: add_record.php?message=Department Successfully Added");
    }else{
        header("Location: add_record.php?errormessage=Sorry an error occured");
    }
}


?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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
                        <h4>Add Level</h4>
                        <hr>
                        <div class="form-group">
                            <form action="add_record.php" method="post">
                                <div class="form-group cen">
                                    <span id="sprytextfield1">
                                        <div class="input-group">
                                          <input class="form-control" type="text" name="level" placeholder="Type new Level name">
                                          <div class="input-group-btn">
                                            <button class="btn btn-primary" type="submit" name="submitlevel"><i class="fa fa-plus"></i> Add Level</button>
                                            </div>
                                        </div>
                                    <span class="textfieldRequiredMsg">Enter Level.</span></span>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="gist-status">
                        <h4>Add Faculty</h4>
                        <hr>
                        <div class="form-group">
                            <form action="add_record.php" method="post">
                                <div class="form-group cen">
                                    <span id="sprytextfield2">
                                        <div class="input-group">
                                          <input class="form-control" type="text" name="faculty" placeholder="Type new faculty name">
                                          <div class="input-group-btn">
                                            <button class="btn btn-primary" type="submit" name="submitfaculty"><i class="fa fa-plus"></i> Add Faculty</button>
                                            </div>
                                        </div>
                                    <span class="textfieldRequiredMsg">Enter Faculty.</span></span>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="gist-status">
                        <h4>Add Department</h4>
                        <hr>
                        <div class="form-group">
                            <form action="add_record.php" method="post">
                                <div class="form-group cen">
                                    <div class="form-body">
                                        <label for="faculty">Faculty</label>
                                        <select name="depfaculty" class="form-control" id="faculty">
                                            <?php while($rows = $faculty->fetch_assoc())  : ?>
                                                <option><?php echo $rows['faculty'] ?></option>
                                            <?php endwhile ?>
                                        </select>
                                    </div>
                                    <span id="sprytextfield3">
                                        <label for="Department">Department</label>
                                        <input class="form-control" id="Department" type="text" name="department" placeholder="Type new Department name">
                                    <span class="textfieldRequiredMsg">Enter Department.</span></span><br>
                                    <button class="btn btn-primary" type="submit" name="submitdepartment"><i class="fa fa-plus"></i> Add Department</button>
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