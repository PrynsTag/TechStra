<?php if ($this->session->flashdata('alert_error')) : ?>
    <div class="alert alert-danger">
        <p><?= $this->session->flashdata('error') ?></p>
    </div>
<?php endif; ?>

<?php if ($this->session->flashdata('alert_success')) : ?>
    <div class="alert alert-success">
        <p><?= $this->session->flashdata('alert_success') ?></p>
    </div>
<?php endif; ?>

<div class="d-flex justify-content-center form_container_2">
    <?= form_open_multipart("posts/add_post", array('method' => 'post')) ?>
    <div class="input-group mb-3">
        <div class="input-group-append">
            <span class="input-group-text"><i class="fas fa-pager"></i></span>
        </div>
        <?= form_input($input_title); ?>
    </div>
    <div class="input-group mb-3">
        <div class="input-group-append">
            <span class="input-group-text"><i class="fas fa-align-justify"></i></span>
        </div>
        <?= form_textarea($input_description); ?>
    </div>
    <div class="input-group mb-3">
        <div class="input-group-append">
            <span class="input-group-text"><i class="fas fa-file-image"></i></span>
        </div>
        <?= form_upload($input_upload); ?>
    </div>
    <div class="d-flex justify-content-center login_container">
        <div class="btn-align">
            <button type="submit" name="submit" class="btn login_btn">Submit</button>
            <a class="back-button" href="<?= base_url("posts") ?>">Back</a>
        </div>
    </div>
    <?php echo form_close(); ?>
</div>