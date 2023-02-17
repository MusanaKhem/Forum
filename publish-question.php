<?php 
    require('actions/users/securityAction.php');
    require('actions/questions/publishQuestionAction.php')
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>
<body>
    <?php include 'includes/navbar.php'; ?>
    <br></br>

    <!-- PUBLISH-QUESTION FORM -->
    <form class="container" method="POST">

        <?php 
            if(isset($errorMsg)){
                echo '<p>'.$errorMsg.'</p>'; 
            }elseif(isset($successMsg)){
                echo '<p>'.$successMsg.'</p>';
            }
        ?>

        <div class="mb-3">
            <label for="exampleInputQuestionObject" class="form-label">Title or object</label>
            <input type="text" class="form-control" name="title">
        </div>

        <div class="mb-3">
            <label for="exampleInputQuestionDescription" class="form-label">Description</label>
            <textarea type="text" class="form-control" name="explanation"></textarea>
        </div>

        <div class="mb-3">
            <label for="exampleInputQuestionContent" class="form-label">Content</label>
            <textarea type="text" class="form-control" name="content"></textarea>
        </div>  

    <button type="submit" class="btn btn-primary" name="validate">Publier la question</button><br></br>

	</form>

</body>
</html>