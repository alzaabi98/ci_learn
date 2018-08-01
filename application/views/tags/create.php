
<?php echo validation_errors(); ?>
<div class="row">

    <div class="col-md-9">
        <?php  echo form_open_multipart('tags/create') ?>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control">
            </div>
            
            
            <div class="form-group">
                <button type="submit" class="btn btn-outline-secondary">Create Tag</button>
            </div>

        </form>
       
    </div>
</div>