<?php

session_start();
if(!isset($_SESSION['auth'])){
    header('Location: ../../login.php');
}

require('../database.php');

// Verify if question's id is correctly placed as a parameter in the URL
if(isset($_GET['id']) AND !empty($_GET['id'])){
 
    $idOfTheQuestion = $_GET['id'];

 
    $checkIfQuestionExists = $bdd->prepare('SELECT * FROM questions WHERE id = ?');
    $checkIfQuestionExists->execute(array($idOfTheQuestion));

    // Recover data question
    if($checkIfQuestionExists->rowCount() > 0){
        // Recover data in an array
        $userInfos = $checkIfQuestionExists->fetch();
        if($userInfos['id_author'] == $_SESSION['id']){

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