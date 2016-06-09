<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>News sletter</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css">
</head>
<body>
    <div id="newsletter_form">
        <?php echo form_open('email/send'); ?>
        <?php
            $name_array = array(
                'name' =>  'name',
                'id'    => 'name',
                'value' => set_value('name')
            );
        ?>
        <p><?php echo form_error('name'); ?></p>
        <p><label for="name">Name: <?php echo form_input($name_array); ?></label></p>
        <p><?php echo form_error('email'); ?></p>
        <p><label for="email">Email: <input type="text" name="email" id="email" value="<?php echo set_value("email"); ?>" /></label></p>    
        <p><?php echo form_submit('submit', 'Submit'); ?></p>

        <?php echo form_close(); ?>
    </div>
    <?php echo validation_errors(); ?>
</body>
</html>