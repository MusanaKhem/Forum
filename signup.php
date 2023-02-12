<?php require('actions/signupAction.php'); ?>
<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>
<body>
	<br></br>
	<form class="container" method="POST">

		<?php if(isset($errorMsg)){ echo '<p>'.$errorMsg.'</p>'; } ?>

		<div class="mb-3">
			<label for="exampleInputPseudo" class="form-label">Pseudo</label>
			<input type="text" class="form-control" name="pseudo">
		</div>

		<div class="mb-3">
			<label for="exampleInputLastname" class="form-label">Lastname</label>
			<input type="text" class="form-control" name="lastname">
		</div>

		<div class="mb-3">
			<label for="exampleInputFirstname" class="form-label">Firstname</label>
			<input type="text" class="form-control" name="firstname" id="exampleInputFirstname">
		</div>  

		<div class="mb-3">
			<label for="exampleInputPassword1" class="form-label">Password</label>
			<input type="password" class="form-control" name="password">
		</div>

	<button type="submit" class="btn btn-primary" name="validate">S'inscrire</button>
	</form>

</body>
</html>