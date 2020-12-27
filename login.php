<?php require 'php/query.php' ?>
<?php require 'php/connect.php' ?>
<?php require 'php/session.php' ?>

<?php
  if (isset($_POST['registerbutton'])) {
    $Auth->loginUser($_POST['email'], md5($_POST['password']));  
  }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login to your account</title>
    <link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
    <?php require 'pages/styles.html' ?>
    <script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
</head>

<body>
    <?php require 'pages/nav.php' ?>
<section class="container-wrap">
    <div class="container">
          <div class="row">
              <div class="col-md-8 col-md-offset-2">
                  <div class="panel">
                      <div class="panel-header">
           	              <h4 class="panel-heading"><i class="fa fa-sign-in"></i> Login</h4>
                      </div> 
                      <form action="login.php" method="post">
                        <div class="panel-body">
                          <?php
                              if (!empty($_GET['message'])) {
                                echo '<div class="alert alert-danger">'.$_GET['message'] .'</div>';    
                              }
                          ?>
                          <?php
                              if (!empty($_GET['error'])) {
                                echo '<div class="alert alert-danger">'.$_GET['error'] .'</div>';    
                              }
                          ?>
                        <div class="form-body">
                       	  <span id="sprytextfield3">
                          <label for="email">E-mail</label>
                          <input type="text" name="email" id="email" class="form-control">
                          <span class="textfieldRequiredMsg">Enter email address.</span><span class="textfieldInvalidFormatMsg">Invalid email format.</span></span> </div>                        
                        <div class="form-body">
                        <span id="sprypassword1">
                          <label for="password">Password</label>
                          <input type="password" name="password" id="password" class="form-control">
                        </span> </div>                    
                    <div class="form-body">
                        <button type="submit" class="btn btn-lg btn-primary" name="registerbutton"><i class="fa fa-sign-in"></i> Login</button>
                      </div>
                  </div>
                      </form>
                  </div>
              </div>
          </div>
    </div>
</section>
    <?php require 'pages/footer.php'?>
    <?php require 'pages/script.html' ?>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none", {validateOn:["blur", "change"]});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "none", {validateOn:["blur", "change"]});
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "email", {validateOn:["blur", "change"]});
</script>
</body>

</html>