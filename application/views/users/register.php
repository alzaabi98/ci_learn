


<div class="row">

    <div class="col-md-6 offset-md-3">
    <?php echo validation_errors(); ?>
        <?php  echo form_open('users/register') ?>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control">
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control">
            </div>

            

            <div class="form-group">
                <button type="submit" class="btn btn-outline-secondary">Join Us</button>
            </div>

        </form>
       
    </div>
</div>