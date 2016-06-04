<?php echo form_open('register/register_user'); ?>
	<?php if (validation_errors()) : ?>
		<h3>Whoop! There was an error:</h3>
		<p><?php echo validation_errors(); ?></p>
	<?php endif; ?>

	<table border="0">
		<tr>
			<td>First Name</td>
			<td><?php echo form_input(array('name' => 'first_name',
				'id' => 'first_name',
				'value' => set_value('first_name', ''),
				'max_length' => '100',
				'size' => '50',
				'style' => 'width:100%')); ?></td>
		</tr>
		<tr>
			<td>Last Name</td>
			<td><?php echo form_input(array('name' => 'last_name',
				'id' => 'last_name',
				'value' => set_value('last_name', ''),
				'max_length' => '100',
				'size' => '50',
				'style' => 'width:100%')); ?></td>
		</tr>
		<tr>
			<td>User Email</td>
			<td><?php echo form_input(array('name' => 'email',
				'id' => 'email',
				'value' => set_value('email', ''),
				'max_length' => '100',
				'size' => '50',
				'style' => 'width:100%')); ?></td>
		</tr>
		<tr>
			<td>Password</td>
			<td><?php echo form_password(array('name' => 'password1',
				'id' => 'password1',
				'value' => set_value('password1', ''),
				'max_length' => '100',
				'size' => '50',
				'style' => 'width:100%')); ?></td>
		</tr>
		<tr>
			<td>Confirm Password</td>
			<td><?php echo form_password(array('name' => 'password2',
				'id' => 'password2',
				'value' => set_value('password2', ''),
				'max_length' => '100',
				'size' => '50',
				'style' => 'width:100%')); ?></td>
		</tr>
	</table>
	<?php echo form_submit('submit', 'Submit'); ?> or
	<?php echo anchor('form', 'cancel'); ?>

</form>