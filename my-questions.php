<?php 

    require('actions/questions/myQuestionsAction.php'); 
    require('actions/users/securityAction.php');
?>

<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>
<body>
    <?php include 'includes/navbar.php'; ?>
    <br></br>
    <div class="container">
        <?php
            while($question = $getAllMyQuestions->fetch()){
                ?>
                <div class="card">
                    <h5 class="card-header">
                        <?= $question('title'); ?>
                    </h5>
                    <div class="card-body">
                        <p class="card-text">
                            <?= $question('explanation'); ?></p>
                        <a href="#" class="btn btn-primary">Access to question content</a>
                        <a href="#" class="btn btn-primary">Modify the article</a>
                    </div>
                </div>
                <?php
            }
        ?>
    </div>
</body>
</html> 