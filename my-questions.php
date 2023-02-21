<?php
    session_start();
    require('actions/questions/myQuestionsAction.php');

?>

<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>
<body>
    <?php include 'includes/navbar.php'; ?>
    <br></br>

    <div class="container">
        
        <p>Below is the complete list of all the questions you asked.</p>
        <div class="container">
            <?php
                while($question = $getAllMyQuestions->fetch()){
                    ?>
                    <!-- Bootstrap lass's card -->
                    <div class="card">
                        <!-- Card title - php dynamics display -->
                        <h6 class="card-header">
                        The <?= $question['publish_datetime']; ?> ; you posted the untitled question : 
                        <a href="question.php?id=<?= $question['id']; ?>">
                            <?= $question['title']; ?>
                        </a>
                        </h6>
                        
                        <!-- Card body -->
                        <div class="card-body">
                            <!-- Card description - php dynamics display -->
                            <p class="card-text">
                                <?= $question['explanation']; ?>
                            </p>
                            
                            <!-- Button to access all user's questions -->
                            <a href="question.php?id=<?= $question['id']; ?>" class="btn btn-primary">Access to question content</a>
                            <!-- Button to modify user's questions -->
                            <a href="edit-question.php?id=<?= $question['id']; ?>" class="btn btn-warning">Modify the question</a>
                            <a href="actions/questions/deleteQuestionAction.php?id=<?= $question['id']; ?>" class="btn btn-danger">Delete the question</a>
                        </div>
                    </div>
                    <br>
                    <?php
                }
            ?>
        </div>
    </div>
</body>
</html> 