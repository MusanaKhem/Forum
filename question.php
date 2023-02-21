<?php 
session_start();
require('actions/questions/showQuestionContentAction.php'); 
?>

<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>
<body>
    <?php include 'includes/navbar.php'; ?>
    <br></br>

    <!-- DISPLAY QUESTION DATA -->
    <!-- Recover all question data's -->
    <div class="container">
        <?php
            if(isset($errorMsg)){ echo $errorMsg; }

            if(isset($question_dateTime)){
                ?>
                <h3><?= $question_title; ?></h3>
                <hr>
                <p><?= $question_content; ?></p>
                <hr>
                <small><?=$question_pseudo_author.' ' . $question_dateTime; ?></small>
                <?php
            }
        ?>
    </div>
</body>
</html>    