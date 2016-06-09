<?php echo form_open('signin/login'); ?>
	<?php if (validation_errors()) : ?>
		<h3>Whoop! There was error!</h3>
		<p><?php echo validation_errors(); ?></p>
	<?php endif; ?>

	<?php if (isset($login_fail)) : ?>
		<h3>Login Error:</h3>
		<p>Username or password is incorrect, please try again.</p>
	<?php endif; ?>

	<table border="0">
		<tr>
			<td>User Email</td>
			<td><?php echo form_input(array(
				'name' =>'email',
				'id' => 'email',
				'max_length' => '100',
				'size' => '50',
				'style' => 'width:100%')); ?>
			</td>
		</tr>
		<tr>
			<td>Password</td>
			<td><?php echo form_password(array(
				'name' =>'password',
				'id' => 'password',
				'max_length' => '100',
				'size' => '50',
				'style' => 'width:100%')); ?>
			</td>

		</tr>
	</table>
	<?php echo form_submit('submit', 'Submit'); ?> or
	<?php echo anchor('signin', 'cancel'); ?>
</form>