<?php
require '../php/connect.php';
require '../php/session.php';
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <?php require 'styles.html' ?>
</head>

<body style="background: rgb(241,241,241)">
    <section class="container">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col">
                    <div class="gist-status" style="background: #fff; padding: 20px; text-align: center;">
                        <h1 style="text-align: center; color: #336699; font-size: 46px; text-shadow: 2px 2px 2px #999;">
                            Opps! Sorry page could not be found
                        </h1>
                        <h3>
                            Go back to <a href="../dashboard.php">home page</a>
                        </h3>
                    </div>
                </div>
            </div>    
        </div>
    </section>
    <?php require 'script.html' ?>
</body>

</html>