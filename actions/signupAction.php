<?php
require('actions/database.php');

// Forms validate
if(isset($_POST['validate'])){
		
	//We verify if the use have correctly complete all reserved spaces
	if(!empty($_POST['pseudo']) AND !empty($_POST['lastname']) AND !empty($_POST['firstname']) AND !empty($_POST['password'])){

		//Here user's data enter by user to sign up on website
		$user_pseudo = htmlspecialchars($_POST['pseudo']);	
		$user_lastname = htmlspecialchars($_POST['lastname']);		
		$user_firstname = htmlspecialchars($_POST['firstname']);		
		$user_password = password_hash($_POST['password'], PASSWORD_DEFAULT);			
	
		
		//We verify if the user already exists in the database
		$checkIfUserAlreadyExists = $bdd->prepare('SELECT pseudo FROM users WHERE pseudo = ?');
		$checkIfUserAlreadyExists->execute(array($user_pseudo));

		if($checkIfUserAlreadyExists->rowCount() == 0){

			// Insert user (new user's data) in BDD
			$insertUserOnWebsite = $bdd->prepare('INSERT INTO users(pseudo, lastname, firstname, mdp)VALUES(?, ?, ?, ?)');
			$insertUserOnWebsite->execute(array($user_pseudo, $user_lastname, $user_firstname, $user_password));

			// Recover user's infos (user who is already on the database)
			$getInfosOfThisUserReq = $bdd->prepare('SELECT id, lastname, firstname, pseudo FROM users WHERE email = ? AND  lastname = ? AND  firstname = ? AND  pseudo = ?');
			$getInfosOfThisUserReq->execute(array($user_lastname, $user_firstname, $user_pseudo));

			// Authenticate user on website and recover his data
			$usersInfos = $getInfosOfThisUserReq->fetch();

			$_SESSION['auth'] = true;
			$_SESSION['id'] = $usersInfos['id'];
			$_SESSION['lastname'] = $usersInfos['lastname'];
			$_SESSION['firstname'] = $usersInfos['firstname'];
			$_SESSION['pseudo'] = $usersInfos['pseudo'];


			// Redirected user to the home page
			header('Location: index.php');

		// Error message if new user "X" choose a same pseudo of another user "Y" (when user "Y" is already register in the database)
		}else{
			$errorMsg = "This user already exists on the website";
		}

	// Error message if new user didn't complete all fields
	}else{
		$errorMsg = "Please complete all fields ...";
	}
}
