<?php $appname = "Chatroom" ?>
<nav class="navbar navbar-inverse navbar-fixed-top navbar-top">
    <div class="container">
        <div class="navbar-header">
            <?php if($Auth->checkAuthUser()) :?>
                <a class="navbar-brand navbar-link" href="dashboard.php"><i class="glyphicon glyphicon-inbox"></i><?php echo $appname ?></a>
            <?php elseif(!$Auth->checkAuthUser()) : ?>
                 <a class="navbar-brand navbar-link" href="index.php"><i class="glyphicon glyphicon-inbox"></i><?php echo $appname ?></a>
            <?php endif ?>
            <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
        </div>
        <div class="collapse navbar-collapse" id="navcol-1">
            <ul class="nav navbar-nav navbar-right">
                <?php if($Auth->checkAuthUser()) :?>
                    <li role="presentation"><a href="dashboard.php"><i class="fa fa-home"></i> Dashboard </a></li>
                    <li role="presentation"><a href="search.php"><i class="fa fa-search"></i> Search</a></li>
                    <li role="presentation"><a href="profile.php?user_id=<?php echo $Auth->getUserDetails()['id'] ?>&key=<?php echo md5($Auth->nameOfUser()) ?>"><i class="fa fa-user"></i> <?php echo ($Auth->nameOfUser()) ?> </a></li>
                    <li role="presentation"><a href="message.php"><i class="fa fa-envelope"></i> Messages </a></li>
                    <li role="presentation"><a href="chatroom.php?Chatroom=<?php echo $Auth->getUserDetails()['department'] ?>&key=<?php echo md5($Auth->getUserDetails()['department']) ?>&chat_type=room"><i class="fa fa-inbox"></i> Chatroom </a></li>
                    <li role="presentation"><a href="logout.php"><i class="fa fa-sign-out"></i>Logout </a></li>
                <?php elseif(!$Auth->checkAuthUser()) : ?>
                    <li class="active" role="presentation"><a href="login.php"><i class="fa fa-sign-in"></i> Login </a></li>
                    <li role="presentation"><a href="register.php"><i class="fa fa-user-plus"></i> Sign up</a></li>                   
                <?php endif ?>
            </ul>
        </div>
    </div>
</nav>