<?php
require 'php/chat.php';
$reciever_id = $_GET['href'];
$sender_id = $_GET['user_id'];
$query = "SELECT * FROM DM where (reciever_id = '$reciever_id'  and  sender_id ='$sender_id') or (sender_id = '$reciever_id'  and  reciever_id ='$sender_id') ";
$message = $winatech->query($query) or die($winatech->error.__LINE__);
?>
<ul>
    <?php while($row = $message->fetch_assoc()) : ?>
    	<?php if ($_SESSION['user_id'] == $row['sender_id']): ?>
    		<li class="message reciever">
	        	<div class="text">
	        		<span><?php echo $row['message'] ?></span>
	        	</div><br>
	        	<span style="color: #ccc; font-size: 12px;"><?php echo $row['dateposted'] ?></span>
	    	</li>
    	<?php else : ?>
    		<li class="message sender">
	        	<div class="text">
	        		<span><?php echo $row['message'] ?></span>
	        	</div><br>
	        	<span style="color: #ccc; font-size: 12px;"><?php echo $row['dateposted'] ?></span>
	    	</li>
   		<?php endif ?>
    <?php endwhile ?>
</ul>