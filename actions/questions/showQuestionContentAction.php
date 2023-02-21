<?php
//USE THE DATABASE
require('actions/database.php');

//Verify if id is correctly entered in URL
if(isset($_GET['id']) AND !empty($_GET['id'])){
    
    // Register identifier variable 
    $idOfTheQuestion = $_GET['id'];

    // Recover all question information
    $checkIfQuestionExists = $bdd->prepare('SELECT * FROM questions WHERE id = ?');
    // Verify is the question selected corresponding to question id
    $checkIfQuestionExists->execute(array($idOfTheQuestion));

    
    if($checkIfQuestionExists->rowCount() > 0){

        // Recover all question data
         $questionsInfos = $checkIfQuestionExists->fetch();

         // Question information storage in specific and defined/determined variable
         $question_title = $questionsInfos['title'];
         $question_content = $questionsInfos['content'];
         $question_id_author = $questionsInfos['id_author'];
         $question_pseudo_author = $questionsInfos['pseudo_author'];
         $question_dateTime = $questionsInfos['publish_datetime'];
    
    }else{
        $errorMsg = "No question was found in the database";
    }

}else{
    // Error message to alert user that no question was found - cause the id is empty OR the id is not recognized by database
    $errorMsg = "No question was found in the database";
}