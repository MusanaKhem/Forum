<?php
require('actions/database.php');

// Forms validate loginAction
if(isset($_POST['validate'])){
		
	//We verify if the user have correctly complete all reserved spaces
	if(!empty($_POST['pseudo']) AND !empty($_POST['password'])){

		//Here user's data enter by user to sign up on website
		$user_pseudo = htmlspecialchars($_POST['pseudo']);			
		$user_password = htmlspecialchars($_POST['password']);			
	
		//We verify if the user already exists in the website database
		$checkIfUserExists = $bdd->prepare('SELECT * FROM users WHERE pseudo = ?');
		$checkIfUserExists->execute(array($user_pseudo));

        //Verify if data were correctly getted
        if($checkIfUserExists->rowCount() > 0){

            //Verify if the user password already exists in the website database
            $usersInfos = $checkIfUserExists->fetch();
		    if(password_verify($user_password, $usersInfos['mdp'])){

            //If user post is correct then user session can start
			$_SESSION['auth'] = true;
			$_SESSION['id'] = $usersInfos['id'];
			$_SESSION['lastname'] = $usersInfos['lastname'];
			$_SESSION['firstname'] = $usersInfos['firstname'];
			$_SESSION['pseudo'] = $usersInfos['pseudo'];
            
            //If User is correctly authenticated then user is redirected to home page
            header('Location: index.php');

            //Error message if user password isn't the same as the database one
            }else{
                $errorMsg = "Your password is incorrect";
            }

		// Error message if new user pseudo doesn't exist in website database
        }else{
            $errorMsg = "Your pseudo is incorrect";
        }        

	// Error message if new user didn't complete all fields
	}else{
		$errorMsg = "Please complete all fields ...";
	}
}