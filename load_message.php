<?php
require 'php/chat.php';
?>
<ul>
    <?php while($row = $chat->fetch_assoc()) : ?>
    	<?php if ($_SESSION['user_id'] == $row['user_id']): ?>
    		<li class="message reciever">
	        	<div class="text">
	        		<span><?php echo $row['message'] ?></span>
	        	</div><br>
	        	<span style="color: #ccc; font-size: 12px;"><?php echo $row['dateposted'] ?></span>
	    	</li>
    	<?php else : ?>
    		<li class="message sender">
	        	<div class="text">
	        		<span style="font-weight: bold;"><?php echo $row['user_name'] ?></span><br>
	        		<span><?php echo $row['message'] ?></span>
	        	</div><br>
	        	<span style="color: #ccc; font-size: 12px;"><?php echo $row['dateposted'] ?></span>
	    	</li>
   		<?php endif ?>
    <?php endwhile ?>
</ul>