
<?php foreach($posts as $post) : ?>
<div class="row mb-2">
    <div class="col-md-3">
        <img src="<?php echo base_url() . 'uploads/' . $post['image'] ?>" height="200" width="200"  alt="">
    </div>

    <div class="col-md-6">
        <h4> <?= $post['title'] ?></h4>

        <small class="badge badge-secondary">
        <?= $post['created_at'] ?>
        </small>
        <p><?= $post['body'] ?></p>

        <div class="badge badge-info">
            <?= $post['name'] ?>
        </div>
        <br><br>
        <a href="<?= base_url(). 'posts/' . $post['id'] ?>" class="btn btn-outline-secondary">Read More ...</a>
        
    </div>


</div>

<?php endforeach ; ?>

<?php echo $this->pagination->create_links() ; ?>