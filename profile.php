<?php 
    session_start();
    require('actions/users/showOneUserProfileAction.php');
?>


<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>
<body>
    <?php include 'includes/navbar.php'; ?>
    <br></br>

    <div class="container">
        <?php
        if(isset($errorMsg)){ echo $errorMsg; }


        if(isset($getHisQuestions)){

            ?>
            <div class="card">
                <div class="card-body">
                    <h4>Session : <?= $user_pseudo; ?></h4>
                </div>
            </div>

            <br>

            <div class="card">
                <div class="card-body">
                    <p>Hi, <?= $user_lastname.' '.$user_firstname; ?>, here you can find all profile information</p>
                </div>
            </div>

            <br>
            
            <p>Bellow, you can see all published questions</p>
            <?php
            while($question = $getHisQuestions->fetch()){
                ?>
                <div class="card">
                    <div class="card-header">
                        <?= $question['title']; ?>
                    </div>
                    <div class="card-body">
                        <?= $question['explanation']; ?>
                    </div>
                    <div class="card-footer">
                       By <?= $question['pseudo_author']; ?></a> le <?= $question['publish_datetime']; ?>
                    </div>
                </div>
                <br>
                <?php
                }
            }
        ?>

    </div>

</body>
</html>