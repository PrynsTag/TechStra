<?php echo form_open('user_login'); ?>
<div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="text" class="form-control">
    <?= form_input($input_username); ?>
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
</div>
<div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control">
    <?= form_input($input_password); ?>
</div>
<button type="submit" class="btn btn-primary">Submit</button>
<?php echo form_close(); ?>