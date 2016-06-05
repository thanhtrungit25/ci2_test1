<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>News sletter</title>
</head>
<body>
	<div id="newsletter_form">
		<?php echo form_open('email/send', 
			array('class' =>'email', 'id' => 'myform'), array('username'=>'joe', 'member_id'=>'234')); ?>
			
		<?php echo form_input('username', ''); ?>
		<?php echo form_close(); ?>
	</div>
</body>
</html>