<?php
// print_r($posts);
// die();
?>

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

<div id="registerContainer">
    <div class="d-flex justify-content-center h-100">
        <div class="logo_card">
            <!--Logo-->
            <div class="d-flex justify-content-center mb-3">
                <div class="brand_logo_container d-flex justify-content-center">
                    <img src="<?= base_url("assets/uploads/posts/") . $posts->post_photo ?>" class="brand_logo w-25 h-auto rounded-circle" alt="Logo" id="image_display">
                </div>
            </div>
            <!--Form-->
            <div class="d-flex justify-content-center form_container_2">
                <?php echo form_open_multipart('posts/edit_post/' . $posts->post_id, array('method' => 'post')); ?>
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
                    <?= form_textarea($input_description) ?>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="fas fa-file-image"></i></span>
                    </div>
                    <?= form_upload($input_upload); ?>
                    <script>
                        function readURL(input) {
                            if (input.files && input.files[0]) {
                                var reader = new FileReader();

                                reader.onload = function(e) {
                                    $('#image_display').attr('src', e.target.result);
                                }
                                reader.readAsDataURL(input.files[0]); // convert to base64 string
                            }
                        }

                        $("#imgInp").change(function() {
                            readURL(this);
                        });
                    </script>
                </div>
                <div class="d-flex justify-content-center login_container">
                    <div class="btn-align">
                        <button type="submit" name="submit" class="btn login_btn">Submit</button> <br>
                        <a class="back-button" href="<?= base_url('posts'); ?>">Back</a>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>