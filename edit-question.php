<?php
    require('actions/users/securityAction.php');
    require('actions/questions/getInfosOfEditedQuestionAction.php');
    require('actions/questions/editQuestionAction.php');
?>

<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>
<body>
    <?php include 'includes/navbar.php'; ?>
    
    <br></br>
    <!-- EDIT-QUESTION FORM -->
    <div class="container">

        <!-- Verify if their are some errors before giving access to user (session, existing question, correct id-author...) -->
        <?php if(isset($errorMsg)){echo '<p>'.$errorMsg.'</p>'; }?>
        
        <!-- Php coding to authorized user to modify selected question -->
        <?php 
            if(isset($question_content)){
                ?>
                <!-- Form to allow identified user to modify all the principals question's parts -->
                <form method="POST">
                    <!-- allow identified user to modify question title -->
                    <div class="mb-3">
                        <label for="exampleModifyQuestionTitle" class="form-label">Title or object</label>
                        <input type="text" class="form-control" name="title" value="<?= $question_title; ?>">
                    </div>
                    <!-- Allow identified user to modify question description -->
                    <div class="mb-3">
                        <label for="exampleModifyQuestionDescription" class="form-label">Description</label>
                        <textarea type="text" class="form-control" name="explanation">
                            <?= $question_explanation; ?>
                        </textarea>
                    </div>
                    <!-- Allow identified user to modify question content -->
                    <div class="mb-3">
                        <label for="exampleModifyQuestionContent" class="form-label">Content</label>
                        <textarea type="text" class="form-control" name="content">
                            <?= $question_content; ?>
                        </textarea>
                    </div>  
                    <!-- Modify button - allow identified user to register modifications about its own question -->
                    <button type="submit" class="btn btn-primary" name="validate">Modify the question</button><br></br>
                </form>
                <?php
            }
        ?>
    </div>
</body>
</html>