


<div class="row">

<div class="col-md-6 offset-md-3">
<?php echo validation_errors(); ?>
    <?php  echo form_open('users/login') ?>
    
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="email" class="form-control">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control">
        </div>
 

        <div class="form-group">
            <button type="submit" class="btn btn-outline-secondary">Login</button>
        </div>

    </form>
   
</div>
</div>