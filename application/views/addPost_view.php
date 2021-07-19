<?php if ($this->session->tempdata('alert_error')) : ?>
    <div class="alert alert-danger">
        <p><?= $this->session->tempdata('alert_error') ?></p>
    </div>
<?php endif; ?>

<?php if ($this->session->tempdata('alert_success')) : ?>
    <div class="alert alert-success">
        <p><?= $this->session->tempdata('alert_success') ?></p>
    </div>
<?php endif; ?>

<!-- Body -->
<div class="container-fluid post-container">
    <h1 class="post-title">Add Post</h1>
</div>
<div class="addpost_container">
    <?= form_open_multipart("posts/add_post", array('method' => 'post')) ?>
    <div class="input-group my-4">
        <i class="material-icons addpost_inputicon">title</i>
        <?= form_input($input_title); ?>
    </div>
    <div class="input-group my-4">
        <span class="material-icons addpost_inputicon">description</span>
        <?= form_textarea($input_description); ?>
    </div>
    <div class="input-group my-4">
        <?= form_upload($input_upload); ?>
    </div>
    <div class="d-flex flex-column justify-content-end">
        <button type="submit" class="btn btn-login w-100 mb-3">Add</button>
        <a class="btn-back d-flex justify-content-center align-items-center" href="<?= base_url("posts"); ?>">Back</a>
    </div>
    <?php echo form_close(); ?>
</div>