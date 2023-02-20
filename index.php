<?php 
    session_start();
    require('actions/questions/showAllQuestionAction.php');
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>
<body>
    <?php include 'includes/navbar.php'; ?>
    <br></br>

    <!-- Create a search bar -->
    <div class="container">

        <!-- Search Forms with 2 inputs types -->
        <p></p>
        <form method="GET">
            <div class="form-group row">
                <div class="col-8">
                    <input type="search" name="search" class="form-control">
                </div>
                <div class="col-4">
                    <button class="btn btn-success" type="submit">Search</button>
                </div>
            </div>
        </form>

        <br>

        <?php
            while($question = $getAllQuestions->fetch()){
                ?>
                <div class="card">
                    <div class="card-header"  style="color: blue">
                        <?= $question['title']; ?>
                    </div>
                    <div class="card-body">
                        <?= $question['explanation']; ?>
                    </div>
                    <div class="card-footer" style="color: darkred">
                        Published by <?= $question['pseudo_author']; ?>, le <?= $question['publish_datetime']; ?>
                    </div>
                </div>
                <br>
                <?php
            }
        ?>

    </div>
</body>
</html>