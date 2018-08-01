
<?php echo validation_errors(); ?>
<div class="row">

    <div class="col-md-9">
        <?php  echo form_open('posts/update') ?>

            <input type="hidden" name="id" value="<?= $post['id'] ?>">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" value="<?= $post['title'] ?>">
            </div>
            <div class="form-group">
                    <label for="body">Body</label>
                    <textarea name="body"  rows="4" class="form-control">"<?= $post['body'] ?></textarea>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-outline-secondary">Update Post</button>
            </div>

        </form>
    </div>
</div>