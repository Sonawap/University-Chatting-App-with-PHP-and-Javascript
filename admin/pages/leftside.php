<?php
error_reporting(0);

?>
<div class="gist-status">
    <div class="status-head">
        Welcome Admin
    </div>
</div>

<div class="gist-status">
    <ul>
        <h4>Menu</h4>
        <a href="dashboard.php"><li><i class="fa fa-home"></i> Dashbaord</li></a>
        <a href="add_record.php"><li><i class="fa fa-plus"></i> Add Records</li></a>
        <a href="edit_record.php"><li><i class="fa fa-edit"></i> View Records</li></a>
    </ul>
    <h4><?php echo $appname ?> © <?php echo date('Y') ?></h4>
</div>