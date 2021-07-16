<?php if ($this->session->flashdata('form_error')) : ?>
    <div class="alert alert-danger">
        <p><?= $this->session->flashdata('form_error') ?></p>
    </div>
<?php endif; ?>

<?php echo form_open('login/user_login'); ?>
<div class="">
    <label for="username" class="form-label">Username</label>
    <?= form_input($input_username); ?>
</div>
<div class="">
    <label for="password" class="form-label">Password</label>
    <?= form_input($input_password); ?>
</div>
<button type="submit" class="btn btn-primary">Login</button>
<?php echo form_close(); ?>
<p>Don't have an account yet? <a href="register">Register</a></p>