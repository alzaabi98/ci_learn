

<div class="row mb-2">
    <div class="col-md-9">

        <h4 class="display-4"> <?= $post['title'] ?></h4>
        <small class="badge badge-secondary mb-2"> <?= $post['created_at'] ?>
        </small>
        <img src="<?php echo base_url() . 'uploads/' . $post['image'] ?>" height="400" width="600"  alt="">
    


       
        <p><?= $post['body'] ?></p>
        <hr>
        
       <?php if ($post['user_id'] == $this->session->user_id) : ?>
            <div style="float:left" class="mr-2">
                    <?php echo form_open('posts/delete/' . $post['id']) ?> 
                    <button type="submit" class="btn btn-outline-danger">Delete</button>
                </form>
            </div>
            
            <a href="<?= base_url(). 'posts/edit/' . $post['id'] ?>" class="btn btn-outline-secondary">Edit</a>      
            <hr>
        <hr>
        <?php endif; ?>
         
            
                <?php foreach ($comments as $comment) : ?>


                <div class="bubble">
                 <p> <?= $comment['body'] ?></p>
                    By <strong><?= $comment['name'] ?></strong> on <?= $comment['created_at'] ?>
            
                </div>    
                
                    
            
                <?php endforeach ; ?>
            
        <h4>add comments </h4>

        <?= validation_errors() ?>

        <?php echo form_open('comments/create') ?>
        
        
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control">
        </div>

        <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" class="form-control">
            </div>

        <div class="form-group">
                <label for="body">Body</label>
                <textarea name="body"  rows="3" class="form-control"></textarea>
        </div>
        <input type="hidden" name="id" value="<?= $post['id'] ?>">
        <div class="form-group">
            <button type="submit" class="btn btn-outline-secondary"> Add Comment</button>
        </div>
        </form>
    
           
            
        
        </div>    
    
</div>

