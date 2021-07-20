<!--Body-->
<div class="container-fluid" id="cardContainer">
    <div class="headingContainer pt-5">
        <?php if ($this->session->tempdata('alert_success')) : ?>
            <div class="alert alert-success">
                <p><?= $this->session->tempdata('alert_success') ?></p>
            </div>
        <?php endif; ?>
        <h1 class="text-center home-title">My Posts</h1>
    </div>
    <div class="bodyContainer">
        <div class="contentContainer">
            <div class="addpost-container">
                <a class="btn-addpost rounded" href="<?= base_url() . "posts/add" ?>">Add Post</a>
            </div>
            <div class="row row-cols-1 row-cols-md-3 g-4 collectionCard">
                <?php if (count($posts) != 0 || count($posts) != NULL) : ?>
                    <?php foreach ($posts as $item) : ?>
                        <div class="col col-remove-margin">
                            <div class="card">
                                <div class="boxImageContainer" style="background: url('<?= base_url('assets/uploads/posts/') . $item->post_photo ?>') center no-repeat; background-size: 100% 100%;">
                                    <div class="d-flex justify-content-between p-3 btn-card-top">
                                        <a href="<?= base_url('posts/delete/'); ?><?= $item->post_id ?>">
                                            <i class="material-icons card-top-button">delete</i>
                                        </a>
                                        <a href="<?= base_url('posts/edit/'); ?><?= $item->post_id ?>">
                                            <i class="material-icons card-top-button">edit</i>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body colcard-body d-flex align-items-center">
                                    <div>
                                        <div class="center-card">
                                            <h5 class="card-title"><?= $item->post_title ?></h5>
                                            <p class="card-text"><?= $item->post_description ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <div class="noitems">
                        <p id="head">No Stories Yet!</p>
                        <p id="sub">You can start by pressing the 'Add Post' button</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>