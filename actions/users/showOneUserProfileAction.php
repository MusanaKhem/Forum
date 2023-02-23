<?php

// Session start
session_start();

// Call out database
require('actions/database.php');

// Verify if user id is correctly entry as a parameter in URL AND GET HIS ID
if(isset($_GET['id']) AND !empty($_GET['id'])){

    // Storage of user id
    $idOfUser = $_GET['id'];

    // Select all data of user that have an id corresponding to the stored id
    $checkIfUserExists = $bdd->prepare('SELECT pseudo, lastname, firstname FROM users WHERE id = ?');

    // Execute the request - Verify if an user really get an id recognized by database
    $checkIfUserExists->execute(array($idOfUser));

    // 
    if($checkIfUserExists->rowCount() > 0){

        // Group user data in a table and get them all
        $usersInfos = $checkIfUserExists->fetch();

        // Store data in variables
        $user_pseudo = $usersInfos['pseudo'];
        $user_lastname = $usersInfos['lastname'];
        $user_firstname = $usersInfos['firstname'];

        // Get all questions, published by user, which have the same id as the id author
        $getHisQuestions = $bdd->prepare('SELECT * FROM questions WHERE id_author = ?');

        // Execute the request
        $getHisQuestions->execute(array($idOfUser));

        

    }else{
        $errorMsg = "No user was found.";
    }


}else{
    $errorMsg = "No user found.";
}