<div id="login_form">
    <h1>Login Form</h1>
    <?php
    echo form_open('login/validate_credentials');

    echo form_input('username', 'Username');
    echo form_password('password', 'Password');
    echo form_submit('submit', 'Submit');
    echo anchor('login/signup', 'Create Account');

    echo form_close();
    ?>
</div>