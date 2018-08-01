
<?php echo validation_errors(); ?>
<div class="row">

    <div class="col-md-9">
        <?php  echo form_open_multipart('posts/create') ?>
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control">
            </div>
            <div class="form-group">
                    <label for="body">Body</label>
                    <textarea name="body"  rows="4" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <select name="tag_id" class="form-control">
                    
                    <?php foreach($tags as $tag) :  ?>
                     <option value="<?= $tag['id'] ?>"> <?= $tag['name'] ?></option>
                    <?php endforeach ; ?>

                </select>
            </div>
            <div class="form-group">
                    <input type="file" name="userfile" >
            </div>
            

            <div class="form-group">
                <button type="submit" class="btn btn-outline-secondary">Create Post</button>
            </div>

        </form>
       
    </div>
</div>