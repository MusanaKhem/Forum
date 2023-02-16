<?php require('securityAction.php'); ?>
<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>
<body>
    <br></br>

    <!-- PUBLISH QUESTION FORM -->
    <form class="container" method="POST">

        <?php if(isset($errorMsg)){ echo '<p>'.$errorMsg.'</p>'; } ?>

        <div class="mb-3">
            <label for="exampleInputQuestionObject" class="form-label">Question's' object</label>
            <input type="text" class="form-control" name="object">
        </div>

        <div class="mb-3">
            <label for="exampleInputQuestionDescription" class="form-label">Question description</label>
            <input type="text" class="form-control" name="description">
        </div>

        <div class="mb-3">
            <label for="exampleInputQuestionContent" class="form-label">Question content</label>
            <input type="text" class="form-control" name="content">
        </div>  

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" name="password">
        </div>

    <button type="submit" class="btn btn-primary" name="validate">Subscribe</button><br></br>

    <!-- SUBSCRIBE REDIRECTION -->
    <a href="login.php"><p>I already have an account. I register now</p>
    </form>

</body>
</html>