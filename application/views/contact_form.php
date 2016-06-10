<div id="contact_form">
    <h1>Contact Us</h1>
    <?php
    echo form_open('contact/submit');

    echo form_input('name', 'Name', 'id="name"');
    echo form_password('email', 'Email Address','id="email"');
    echo form_textarea(array('name' => 'message', 'cols' => 35, 'rows' => 15), 'Message', 'id="message"');
    echo form_submit('submit', 'Submit', 'id="submit"');
    echo anchor('login/signup', 'Create Account');

    echo form_close();
    ?>
</div>

<script type="text/javascript">
    $("#submit").click(function() {
        var form_data = {
            name: $('#name').val(),
            email: $('#email').val(),
            message: $('#message').val(),
            ajax: '1',
        };

        $.ajax({
            url: "<?php echo site_url('contact/submit'); ?>",
            type: 'POST',
            data: form_data,
            success: function(msg) {
                $('#main_content').html(msg);
            }
        });

        return false;
    });


</script>