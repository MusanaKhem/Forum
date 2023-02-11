<?php
session_start;
	require('actions/database.php');

	if(isset($_POST['validate'])){
		
		//We verify if the use have correctly complete all reserved spaces
		if(!empty($_POST['email']) AND !empty($_POST['pseudo']) AND !empty($_POST['lastname']) AND !empty($_POST['firstname']) AND !empty($_POST['password']) AND !empty($_POST['checkbox'])){

		//Here user's data enter by user to sign up on website
		$user_email = htmlspecialchars($_POST['email']);
		$user_pseudo = htmlspecialchars($_POST['pseudo']);	
		$user_lastname = htmlspecialchars($_POST['lastname']);		
		$user_firstname = htmlspecialchars($_POST['firstname']);		
		$user_password = password_hash($_POST['password'], PASSWORD_DEFAULT);			
	
		
		//We verify if the user already exists in the database
		$checkIfUserAlreadyExists = $bdd->prepare('SELECT pseudo FROM users WHERE pseudo = ?');
		$checkIfUserAlreadyExists->execute(array('$user_pseudo'));

		if($checkIfUserAlreadyExists->rowCount() == 0){

			// Insert user (new user's data) in BDD
			$insertUserOnWebsite = $bdd->prepare('INSERT INTO users(email, pseudo, lastname, firstname, mdp)VALUES(?, ?, ?, ?, ?)');
			$insertUserOnWebsite->execute(array('$user_email, $user_pseudo, $user_lastname, $user_firstname, $user_password'));

			// Recover user's infos (user who is already on the database)
			$getInfosOfThisUserReq = $bdd->prepare('SELECT id, email, lastname, firstname, pseudo, mdp FROM users WHERE email = ? AND  lastname = ? AND  firstname = ? AND  pseudo = ? AND  mdp = ?');
			$getInfosOfThisUserReq->execute(array('$user_email, $user_lastname, $user_firstname, $user_pseudo, $user_password'));

			// Authenticate user on website and recover his data
			$usersInfos = $getInfosOfThisUserReq->fetch();

			$_SESSION['auth'] = true;
			$_SESSION['id'] = $usersInfos['id'];
			$_SESSION['email'] = $usersInfos['email'];
			$_SESSION['lastname'] = $usersInfos['lastname'];
			$_SESSION['firstname'] = $usersInfos['firstname'];
			$_SESSION['pseudo'] = $usersInfos['pseudo'];
			$_SESSION['mdp'] = $usersInfos['mdp'];

		// Error message if new user "X" choose a same pseudo of another user "Y" (when user "Y" is already register in the database)
		}else{
			$errorMsg = "This user already on the website";
		}

		// Error message if new user didn't complete all fields
		}else{
		$errorMsg = "Please complete all fields !";
		}
	}
?>

