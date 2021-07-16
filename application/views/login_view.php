<?php echo form_open('user_login'); ?>
<div class="mb-3">
    <label for="username" class="form-label">Username</label>
    <?= form_input($input_username); ?>
</div>
<div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <?= form_input($input_password); ?>
</div>
<button type="submit" class="btn btn-primary">Login</button>
<?php echo form_close(); ?>
<p>Don't have an account yet? <a href="register">Register</a></p>