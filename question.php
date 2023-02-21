<?php
session_start();
require('actions/questions/showQuestionContentAction.php');
require('actions/questions/answerQuestionAction.php');
require('actions/questions/showAllAnswersQuestionAction.php')
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
                <section class="show-content">
                    <h3><span style="color: brown">Title</span> : <?= $question_title; ?></h3>
                    <hr>
                    <p><span style="color: brown">Content</span> : <?= $question_content; ?></p>
                    <hr>
                    <small><span style="color: brown">Author and pulication date and time</span> : <?=$question_pseudo_author.' ' . $question_dateTime; ?></small>
                </section>

                <br>

                <section class="show-answers">
                    <form class="form-group" method="POST">
                        <div class="mb-3">
                            <label style="color: green" for="exampleInputAnswer" class="form-label">Question Answer</label>
                            <textarea name="answer" class="form-control"></textarea>
                            <br>
                            <button class="btn btn-primary" type="submit" name="validate"><span style="color: gold">Answer<span></button>
                        </div>
                    </form>
                    <br>
                    <p>Here you can read all the answers corresponding to the question</p>
                    <?php
                        while($answer = $getAllAnswersOfThisQuestion->fetch()){
                            ?>
                            <div class="card">
                                <div class="card-header">
                                    <?= $answer['pseudo_author']; ?>
                                </div>
                                <div class="card-body">
                                    <?= $answer['content']; ?>
                                </div>
                            </div>
                            <br>
                            <?php
                        }
                    ?>
                </section>
                <?php
            }
        ?>
    </div>
</body>
</html>    