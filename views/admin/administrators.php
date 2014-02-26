<div class="row">
    <div class="small-offset-1 large-offset-0 small-11 large-3 columns">
        <h2>Edit Administrators</h2>
        <table>
            <tr>
                <th>Username</th>
                <th>Role</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            <?php

            foreach ($this->users AS $user) {
                ?>
                <tr>
                    <td><?php echo $user['login']; ?></td>
                    <td><?php echo $user['role']; ?></td>
                    <td><a class="blue-text" href="<?php echo URL;?>admin/editAdmin/<?php echo $user['userid'];?>" title="Edit">Edit</a></td>
                    <?php if($user['role']=='owner' && $_SESSION['role']!= 'owner'):?>
                        <td>Delete</td>
                    <?php else: ?>
                        <td><a class="red-text delete" href="<?php echo URL;?>admin/deleteAdmin/<?php echo $user['userid'];?>" title="Delete">Delete</a></td>
                    <?php endif;?>
                </tr>
            <? } ?>
        </table>
    </div>

    <div class="small-offset-1 small-11 large-5 columns">

        <h2>Create Administrator</h2>

        <form action="<?php echo URL; ?>admin/createAdmin/<?php echo Session::get('userid'); ?>/index" method="post">
            <?php $admin = $this->admin; ?>
            <label for="email">Email</label>
            <input type="email" name="email" value="<?php echo $admin[0]['login']; ?>"/>

            <label for="role">Admin Role</label>
            <select name="role">
                <option value="default">Default</option>
                <option value="admin">Admin</option>
                <?php if ($this->role == 'owner'): ?>
                    <option value="owner">Owner</option>
                <?php endif; ?>
            </select>

            <input type="submit" name="submit" value="Create" class="button large expand green">

            <?php
            if (isset($this->msg)) {
                if (is_array($this->msg)) {
                    foreach ($this->msg AS $key => $value) {
                        echo "<span class='$key'>" . $value . "</span><br/>";
                    }
                } else {
                    echo "<span class='$key'>" . $this->msg . "</span>";
                }
            }
            ?>
        </form>

        <h4>Why no Password?</h4>

        <p>For security purposes, we auto assign a password to each new administrator. Upon initital sign-in, they will
            be prompted to change their password.</p>
    </div>
</div>