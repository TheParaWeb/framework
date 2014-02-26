<div class="row">
    <div class="small-offset-1 large-offset-3 small-11 large-6 columns">
        <h2>Admin Log-In</h2>

        <form action="<?php echo URL;?>admin/adminLogin/" method="post">


            <label for="email">Email</label>
            <input type="email" name="email"/>

            <label for="password">Password</label>
            <input type="password" name="password"/>

            <input type="submit" name="submit" value="Login" class="button large expand green">
            <?php if(isset($this->view->msg)): echo "<span class='error'>$this->view->msg</span>";endif;?>
        </form>

        <a href="<?php echo URL; ?>admin/forgot" class="admin-login">Forgot your password?</a>
    </div>
</div>