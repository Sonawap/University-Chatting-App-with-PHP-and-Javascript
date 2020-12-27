<?php
error_reporting(0);
require 'php/connect.php';
require 'php/session.php';
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome - Register or Login</title>
    <?php require 'pages/styles.html' ?>
</head>

<body>
    <?php require 'pages/nav.php' ?>
    <div class="jumbotron hero">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-push-7 phone-preview">
                    <div class="iphone-mockup"><img src="assets/img/iphone.svg" class="device">
                        <div class="screen"></div>
                    </div>
                </div>
                <div class="col-md-6 col-md-pull-3 get-it">
                    <h1>Our Fantastic App</h1>
                    <p>Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio, dapibus ac facilisis in, egestas eget quam.</p>
                </div>
            </div>
        </div>
    </div>
    <section class="testimonials">
        <h2 class="text-center">People Love It!</h2>
        <blockquote>
            <p>I love this website it let me send messages to other users and it very safe</p>
            <footer>Adeleke Oluwatoyin</footer>
        </blockquote>
    </section>
    <section class="features">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2>Fantastic Features</h2>
                    <p>The following are what we offer on this website.</p>
                </div>
                <div class="col-md-6">
                    <div class="row icon-features">
                        <div class="col-xs-4 icon-feature"><i class="glyphicon glyphicon-comment"></i>
                            <p>Messaging </p>
                        </div>
                        <div class="col-xs-4 icon-feature"><i class="fa fa-users fa-5x"></i>
                            <p>Saves You Money</p>
                        </div>
                        <div class="col-xs-4 icon-feature"><i class="glyphicon glyphicon-fire"></i>
                            <p>Authentication System</p>
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