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
                    <h3><span style="color: brown"><b>Title : </b></span><?= $question_title; ?></h3>
                    <hr>
                    <p><span style="color: brown"><b>Content : </b></span><?= $question_content; ?></p>
                    <hr>
                    <small><span style="color: brown"><b>Author : </b></span>
                        <?= '<a href="profile.php?id='.$question_id_author.'">'.$question_pseudo_author.'</a>'; ?> --- </small>
                    <small><span style="color: brown"><b> Published on : </b></span>
                        <?= $question_dateTime; ?>
                    </small>
                </section>

                <br>

                <section class="show-answers">
                    <form class="form-group" method="POST">
                        <div class="mb-3">
                            <label style="color: green" for="exampleInputAnswer" class="form-label"><b>-> Purpose your answer and press the button below</b></label>
                            <textarea name="answer" class="form-control"></textarea>
                            <br>
                            <button class="btn btn-success" type="submit" name="validate"><span style="color: gold">Answer<span></button>
                        </div>
                    </form>
                    <br>
                    <p><b>-> Here you can read all the answers corresponding to the question</b></p>
                    <?php
                        while($answer = $getAllAnswersOfThisQuestion->fetch()){
                            ?>
                            <div class="card">
                                <div class="card-header">
                                    <a href="profile.php?id=<?= $answer['id_author'];?>"><?= $answer['pseudo_author']; ?>
                                    </a>
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