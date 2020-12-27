<?php require 'php/query.php' ?>
<?php require 'php/connect.php' ?>
<?php require 'php/session.php' ?>
<?php
if (isset($_POST['registerbutton'])) {
  $firstname = $_POST['firstname'];
  $othername = $_POST['othername'];
  $level = $_POST['level'];
  $department = $_POST['department'];
  $faculty = $_POST['faculty'];
  $email = $_POST['email'];
  $password = md5($_POST['password']);
  $date = date('Y-m-d');

  $query = "INSERT INTO users (firstname,othername,level,department,faculty,email,password,dateposted) values ('$firstname','$othername','$level','$department','$faculty','$email','$password','$date')";
  $register = $winatech->query($query) or die($winatech->error.__LINE__);
  

  if ($register) {
    $Auth->loginUser($_POST['email'], $password);  
  }

}


?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Join Us</title>
    <link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
    <link href="SpryAssets/SpryValidationPassword.css" rel="stylesheet" type="text/css">
    <link href="SpryAssets/SpryValidationConfirm.css" rel="stylesheet" type="text/css">
    <link href="SpryAssets/SpryValidationCheckbox.css" rel="stylesheet" type="text/css">
    <?php require 'pages/styles.html' ?>
    <script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
    <script src="SpryAssets/SpryValidationPassword.js" type="text/javascript"></script>
    <script src="SpryAssets/SpryValidationConfirm.js" type="text/javascript"></script>
    <script src="SpryAssets/SpryValidationCheckbox.js" type="text/javascript"></script>
</head>

<body>
    <?php require 'pages/nav.php' ?>
<section class="container-wrap">
    <div class="container">
          <div class="row">
              <div class="col-md-8 col-md-offset-2">
                  <div class="panel">
                      <div class="panel-header">
           	              <h4 class="panel-heading"><i class="fa fa-users"></i> Register</h4>
                      </div> 
                      <form action="register.php" method="post">
                          <div class="panel-body">
                        <div class="form-body">
                            <span id="sprytextfield1">
                              <label for="Firstname">First Name</label>
                              <input type="text" name="firstname" id="Firstname" class="form-control">
                              <span class="textfieldRequiredMsg">Please enter your first name.</span>
                            </span> 
                        </div>
                          
                        <div class="form-body">
                          <span id="sprytextfield2">
                            <label for="Othername">Other Names</label>
                            <input type="text" name="othername" id="Othername" class="form-control">
                          <span class="textfieldRequiredMsg">Please enter your other names.</span></span> </div>
                        <div class="form-body">
                            <label for="department">Level</label>
                            <select name="level" class="form-control" id="level">
                                  <?php while($rows = $level->fetch_assoc())  : ?>
                              <option><?php echo $rows['level'] ?></option>
                                  <?php endwhile ?>
                              </select>
                        </div>
                        <div class="form-body">
                            <label for="department">Department</label>
                            <select name="department" class="form-control" id="department">
                                <?php while($rows = $department->fetch_assoc())  : ?>
                              <option><?php echo $rows['department'] ?></option>
                                  <?php endwhile ?>
                              </select>
                        </div>
                        
                        <div class="form-body">
                        <label for="faculty">Faculty</label>
                        <select name="faculty" class="form-control" id="faculty">
                                <?php while($rows = $faculty->fetch_assoc())  : ?>
                                      <option><?php echo $rows['faculty'] ?></option>
                                  <?php endwhile ?>
                          </select>
                        </div>
                        
                        <div class="form-body">
                       	  <span id="sprytextfield3">
                          <label for="email">E-mail</label>
                          <input type="text" name="email" id="email" class="form-control">
                          <span class="textfieldRequiredMsg">Enter email address.</span><span class="textfieldInvalidFormatMsg">Invalid email format.</span></span> </div>                        
                        <div class="form-body">
                        <span id="sprypassword1">
                          <label for="password">Password</label>
                          <input type="password" name="password" id="password" class="form-control">
                        <span class="passwordRequiredMsg">Enter a password for your account.</span><span class="passwordMinCharsMsg">password must be more than six (6) characters.</span><span class="passwordMaxCharsMsg">Password must be less than 18 characters.</span></span> </div>
                      <div class="form-body">
                        <span id="spryconfirm1">
                        <label for="cpassword">Confirm Password</label>
                        <input type="password" name="cpassword" id="cpassword" class="form-control">
                      <span class="confirmRequiredMsg">Please confirm your password.</span><span class="confirmInvalidMsg">The password does not match your previous password.</span></span> </div>
                      <div class="form-body">
                        <span id="sprycheckbox1">
                        <input type="checkbox" name="policy" id="policy">
                        <label for="policy">Agress to our Policy</label>
                      <span class="checkboxRequiredMsg">Please make sure you agree to our policy.</span></span> </div>
                      
                    <div class="form-body">
                        <button type="submit" class="btn btn-lg btn-primary" name="registerbutton"><i class="fa fa-user-plus"></i> Sign up now</button>
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
var sprypassword1 = new Spry.Widget.ValidationPassword("sprypassword1", {validateOn:["blur", "change"], minChars:6, maxChars:18});
var spryconfirm1 = new Spry.Widget.ValidationConfirm("spryconfirm1", "password", {validateOn:["blur", "change"]});
var sprycheckbox1 = new Spry.Widget.ValidationCheckbox("sprycheckbox1");
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "email", {validateOn:["blur", "change"]});
</script>
</body>

</html>