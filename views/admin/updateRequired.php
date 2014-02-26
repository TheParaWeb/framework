<div class="row">
    <div class="small-offset-1 large-offset-0 small-11 large-5 columns">
        <h2>Update Required</h2>

        <p>We're sorry for the inconvience, but your security is important to us! Please take the time to change your
            password and security question.</p>
    </div>

    <div class="small-offset-1 small-11 large-5 columns">

        <h2>My Profile</h2>

        <form action="<?php echo URL; ?>admin/updateProfile/<?php echo Session::get('userid'); ?>/index" method="post">
            <?php $admin = $this->admin; ?>
            <label for="email">Email</label>
            <input type="email" name="email" value="<?php echo $admin[0]['login']; ?>"/>

            <label for="password1">New Password</label>
            <input type="password" name="password1"/>

            <label for="password2">Confirm Password</label>
            <input type="password" name="password2"/>

            <label for="question">Security Question</label>
            <select name="question">
                <option value="0">Select One...</option>
                <?php
                foreach ($this->secQuestions AS $question) {
                    echo "<option value='" . $question['questionid'] . "'";
                    if ($question['questionid'] == $admin[0]['questionid']) {
                        echo 'selected';
                    }
                    echo ">" . stripslashes($question['question']) . "</option>";
                }
                ?>
            </select>

            <label for="answer">Security Answer</label>
            <input type="text" name="answer" value="<?php echo $admin[0]['questiona']; ?>"/>

            <input type="submit" name="submit" value="Save" class="button large expand green">

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
    </div>
</div>