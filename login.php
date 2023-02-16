<?php require('actions/loginAction.php'); ?>
<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>
<body>
<br></br>
    <!-- LOGIN FORM -->
	<form class="container" method="POST">

		<?php if(isset($errorMsg)){ echo '<p>'.$errorMsg.'</p>'; } ?>

		<div class="mb-3">
			<label for="exampleInputPseudo" class="form-label">Pseudo</label>
			<input type="text" class="form-control" name="pseudo">
		</div>

		<div class="mb-3">
			<label for="exampleInputPassword1" class="form-label">Password</label>
			<input type="password" class="form-control" name="password">
		</div>

	<button type="submit" class="btn btn-primary" name="validate">Log in</button><br></br>

    <!-- SUBSCRIBE REDIRECTION -->
	<a href="signup.php"><p>You don't have any account ? Create one by clicking on this link</p>
	</form>

</body>
</html>
