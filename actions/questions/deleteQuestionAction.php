<?php
// Session start
session_start();

// Verify if user is authenticated
if(!isset($_SESSION['auth'])){
    // If user is not authenticated then user is redirected to login page
    header('Location: ../../login.php');
}

// Call out database
require('../database.php');

// Verify if question's id is correctly placed as a parameter in the URL
if(isset($_GET['id']) AND !empty($_GET['id'])){
 
    $idOfTheQuestion = $_GET['id'];

 
    $checkIfQuestionExists = $bdd->prepare('SELECT * FROM questions WHERE id = ?');
    $checkIfQuestionExists->execute(array($idOfTheQuestion));

    // Recover data question
    if($checkIfQuestionExists->rowCount() > 0){
        // Recover data in an array
        $questionInfos = $checkIfQuestionExists->fetch();
        if($questionInfos['id_author'] == $_SESSION['id']){

            $deleteThisQuestion = $bdd->prepare('DELETE FROM questions WHERE id = ?');
            $deleteThisQuestion->execute(array($idOfTheQuestion));

            header('Location: ../../my-questions.php');

        }else{
            $errorMsg = "You are not authorize to delete questions which are not yours.";
        }

    }else{
        $errorMsg = "No question was found";
    }

}else{
    $errorMsg = "No question was found";
}