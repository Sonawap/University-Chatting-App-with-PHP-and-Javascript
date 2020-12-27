<div class="gist-status">
    <div class="media status-head">
        <div class="media-left">
            <a><img class="img-circle status-image" src="images/profile_pic/<?php echo $Auth->profile_pic() ?>" width="70" height="70"></a>
        </div>
        <div class="media-body">
            <div class="follow-head">
                <div class="col-sm-12">
                    <h4><?php echo ($Auth->nameOfUser()) ?> </h4>
                    <p class="text-left text-muted status-text"><?php echo $Auth->getUserDetails()['level'] ?></p>
                    <p class="text-left text-muted status-text"><?php echo $Auth->getUserDetails()['department'] ?> Department</p>
                    <p class="text-left text-muted status-text">Faculty of <?php echo $Auth->getUserDetails()['faculty'] ?></p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="gist-status">
    <ul>
        <h4>Chats</h4>
        <a href="dashboard.php"><li><i class="fa fa-home"></i> Dashbaord</li></a>
        <a href="chatroom.php?Chatroom=<?php echo $Auth->getUserDetails()['department'] ?>&key=<?php echo md5($Auth->getUserDetails()['department']) ?>&chat_type=room"><li><i class="fa fa-users"></i> Chatroom</li></a>
        <a href="message.php"><li><i class="fa fa-envelope"></i> Messages</li> </a>
        <a href="profile.php?user_id=<?php echo $Auth->getUserDetails()['id'] ?>&key=<?php echo md5($Auth->nameOfUser()) ?>"><li><i class="fa fa-user"></i> Profile</li> </a>
        <a href="online.php"><li><i class="fa fa-envelope"></i> Online Users</li> </a>
    </ul>
    <h4><?php echo $appname ?> © <?php echo date('Y') ?></h4>
</div>