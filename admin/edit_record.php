<?php
session_start();
require '../php/connect.php';
require '../php/query.php';
$admin_id = $_SESSION['user_id'];
$query = "SELECT * FROM users where id != '$admin_id' ORDER BY id DESC LIMIT 18 ";
$result=$winatech->query($query) or die($winatech->error.__LINE__);
$resultcount=$result->num_rows;

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Records</title>
    <?php require 'pages/styles.html' ?>
</head>

<body>
    <?php require 'pages/nav.php' ?>
    <section class="container-wrap">
        <div class="container wrap">
            <div class="row">
                <div class="col-md-4 col">
                    <?php require 'pages/leftside.php' ?>
                </div>
                <div class="col-md-7 col">
                    <?php
                        if (!empty($_GET['message'])) {
                            echo '<div class="alert alert-info">'.$_GET['message'] .'</div>';    
                        }
                    ?> 
                    <?php
                        if (!empty($_GET['errormessage'])) {
                            echo '<div class="alert alert-danger">'.$_GET['message'] .'</div>';    
                        }
                    ?>
                    <div class="gist-status">
                        <div class="row" style="margin: 0px;">
                            <h4>Level Records <small><span class="pull-right">Total Level <?php echo $level->num_rows ?></span></small> </h4>
                            <hr>
                            <?php if ($level->num_rows < 1) : ?> 
                                <h4 class="text-center"><i class="fa fa-frown-o"></i> Sorry no other Level is found</h4>
                            <?php else : ?>
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table" style="color: #999">
                                            <thead>
                                                <tr>
                                                    <th>ID </th>
                                                    <th>Level </th>
                                                    <th>Action </th>
                                                    <th>Delete </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php while($row = $level->fetch_assoc()) : ?>
                                                <tr>                                              
                                                    <td><?php echo $row['id'] ?></td>
                                                    <td><?php echo $row['level'] ?></td>
                                                    <td><a href="edit_level.php?level=<?php echo $row['level'] ?>">Edit</a></td>
                                                    <td><a href="delete.php?table=level&row=<?php echo $row['level'] ?>">Delete</a></td>                                               
                                                </tr>
                                                <?php endwhile ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            <?php endif ?>  
                        </div>
                    </div>

                    <div class="gist-status">
                        <div class="row" style="margin: 0px;">
                            <h4>Faculty Records <small><span class="pull-right">Total Level <?php echo $faculty->num_rows ?></span></small> </h4>
                            <hr>
                            <?php if ($faculty->num_rows < 1) : ?> 
                                <h4 class="text-center"><i class="fa fa-frown-o"></i> Sorry no other Faculty is found</h4>
                            <?php else : ?>
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table" style="color: #999">
                                            <thead>
                                                <tr>
                                                    <th>ID </th>
                                                    <th>Level </th>
                                                    <th>Action </th>
                                                    <th>Delete </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php while($row = $faculty->fetch_assoc()) : ?>
                                                <tr>                                              
                                                    <td><?php echo $row['id'] ?></td>
                                                    <td>Faculty of <?php echo $row['faculty'] ?></td>
                                                    <td><a href="edit_faculty.php?faculty=<?php echo $row['faculty'] ?>">Edit</a></td>
                                                    <td><a href="delete.php?table=faculty&row=<?php echo $row['faculty'] ?>">Delete</a></td>                                               
                                                </tr>
                                                <?php endwhile ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div> 
                            <?php endif ?> 
                        </div>
                    </div>

                    <div class="gist-status">
                        <div class="row" style="margin: 0px;">
                            <h4>Department Records <small><span class="pull-right">Total Level <?php echo $department->num_rows ?></span></small> </h4>
                            <hr>
                            <?php if ($department->num_rows < 1) : ?> 
                                <h4 class="text-center"><i class="fa fa-frown-o"></i> Sorry no other Department is found</h4>
                            <?php else : ?>
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table" style="color: #999">
                                            <thead>
                                                <tr>
                                                    <th>ID </th>
                                                    <th>Department </th>
                                                    <th>Action </th>
                                                    <th>Delete </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php while($row = $department->fetch_assoc()) : ?>
                                                <tr>                                              
                                                    <td><?php echo $row['id'] ?></td>
                                                    <td><?php echo $row['department'] ?> Department</td>
                                                    <td><a href="edit_department.php?department=<?php echo $row['department'] ?>&facultyget=<?php echo $row['faculty'] ?>">Edit</a></td>
                                                    <td><a href="delete.php?table=department&row=<?php echo $row['department'] ?>">Delete</a></td>                                               
                                                </tr>
                                                <?php endwhile ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>  
                            <?php endif ?>
                        </div>
                    </div>

                </div>
            </div>    
        </div>
    </section>
    <?php require '../pages/script.html' ?>
</body>

</html>