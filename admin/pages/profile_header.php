<div class="gist-status">
    <div class="media status-head">
        <div class="media-left">
            <a><img class="status-image" src="images/profile_pic/<?php echo $Auth->getUserDetails()['profile_pic'] ?>" width="100" height="100"></a>
        </div>
        <div class="media-body">
            <div class="follow-head">
                <div class="col-sm-12">
                    <h4><?php echo ($Auth->nameOfUser()) ?> </h4>
                    <h5 class="text-left text-muted status-text"><a href="profile_photo.php">Change Profile Photo</a></h5>
                </div>
            </div>
        </div>
    </div>
</div>