<?php $appname = "Chatty" ?>
<nav class="navbar navbar-inverse navbar-fixed-top navbar-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand navbar-link" href="dashboard.php"><i class="glyphicon glyphicon-inbox"></i><?php echo $appname ?></a>
            <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
        </div>
        <div class="collapse navbar-collapse" id="navcol-1">
            <ul class="nav navbar-nav navbar-right">
                <li role="presentation"><a href="dashboard.php"><i class="fa fa-home"></i> Dashboard </a></li>
                <li role="presentation"><a href="search.php"><i class="fa fa-search"></i> Search</a></li>
                <li role="presentation"><a href="../logout.php"><i class="fa fa-sign-out"></i>Logout </a></li>
            </ul>
        </div>
    </div>
</nav>