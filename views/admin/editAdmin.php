<div class="row">
    <div class="small-offset-1 large-offset-3 small-11 large-6 columns">
        <h2>Edit Administrator</h2>
        <?php $admin = $this->admin; ?>
        <form action="<?php echo URL; ?>admin/updateAdministrator/<?php echo $admin[0]['userid'];?>/" method="post">
            <label for="email">Email / Username</label>
            <input type="email" name="email" value="<?php echo $admin[0]['login']; ?>"/>

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

            <input style="float:left; margin-right:10px;" type="checkbox" name="resetPassword" value="1"/>
            <label for="resetPassword">Reset Password?</label>

            <input type="submit" name="submit" value="Save" class="button large expand green">
            <a class="button large expand red" href="<?php echo URL;?>admin/administrators/" title="Go Back">Cancel</a>
            <?php
            if (isset($this->msg)) {
                if (is_array($this->msg)) {
                    foreach ($this->msg AS $key => $value) {
                        echo "<span class='$key'>" . $value . "</span>";
                    }
                } else {
                    echo "<span class='$key'>" . $this->msg . "</span>";
                }

            }
            ?>
        </form>
    </div>
</div>