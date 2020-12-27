<?php
require '../php/connect.php';
require '../php/session.php';
$Auth->OnlineUsers();
$Auth->logUserOut();
$user_id = $_SESSION['user_id'];
if (isset($_POST['search'])) {
    $keyword = $_POST['search2'];
    $query="SELECT*FROM users WHERE firstname LIKE '%%$keyword%%'||othername LIKE '%%$keyword%%'||email Like '%%$keyword%%'||department Like '%%$keyword%%'||faculty Like '%%$keyword%%'||level Like '%%$keyword%%' order by id DESC";
    $result = $winatech->query($query) or die($winatech->error.__LINE__);
    $resultcount = $result->num_rows;
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
    <?php require 'pages/styles.html' ?>
<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
</head>

<body>
    <?php require 'pages/nav.php' ?>
    <section class="container-wrap">
        <div class="container wrap">
            <div class="row">
                <div class="col-md-8 col col-md-offset-2">
                    <div class="form-group">
                        <form action="search.php" method="post">
                            <div class="form-group cen">
                                <span id="sprytextfield1">
                                    <div class="input-group">
                                      <input class="form-control" type="text" name="search2" placeholder="Search for name, email etc">
                                      <div class="input-group-btn">
                                        <button class="btn btn-primary" type="submit" name="search"><i class="fa fa-search"></i> Search</button>
                                        </div>
                                    </div>
                                <span class="textfieldRequiredMsg">Enter a keywod for search.</span></span>
                            </div>
                        </form>
                    </div>
                    <?php if(isset($_POST['search'])) : ?>
                        <div class="gist-status">
                            <h4>Search Result[s]<small><span class="pull-right"><?php echo $resultcount ?> result[s] found</span></small></h4><hr>
                            <?php if ($resultcount < 1) : ?> 
                                <h4 class="text-center"><i class="fa fa-frown-o"></i> Sorry no result found</h4>
                            <?php endif ?>
                            <?php while($row = $result->fetch_assoc()) : ?>
                                <div class="media status-head">
                                    <div class="media-left">
                                        <a  href="admin_view_profile.php?user_id=<?php echo $row['id'] ?>&key=<?php echo md5($row['firstname']) ?>"><img class="img-circle status-image" src="../images/profile_pic/<?php echo $row['profile_pic'] ?>" width="70" height="70"></a>
                                    </div>
                                    <div class="media-body">
                                        <div class="follow-head">
                                            <div class="col-sm-12">
                                                <a  href="admin_view_profile.php?user_id=<?php echo $row['id'] ?>&key=<?php echo md5($row['firstname']) ?>"><h4><?php echo $row['firstname'].' ' . $row['othername'] ?></h4></a>
                                                <p class="text-left text-muted status-text"><?php echo $row['department'] ?> Department</p>                                            
                                            </div>
                                        </div>
                                    </div>
                                </div><hr>
                            <?php endwhile ?>
                            End
                        </div>
                    <?php endif ?>
                </div>
            </div>    
        </div>
    </section>
    <?php require 'pages/script.html' ?>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none", {validateOn:["blur", "change"]});
</script>
</body>

</html>