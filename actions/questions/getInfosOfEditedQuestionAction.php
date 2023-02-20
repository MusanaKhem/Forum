<?php

require('actions/database.php');

// Verify if question's id is correctly placed as a parameter in the URL
if(isset($_GET['id']) AND !empty($_GET['id'])){
 
    $idOfQuestion = $_GET['id'];

    // Verify if question exists
    $checkIfQuestionExists = $bdd->prepare('SELECT * FROM questions WHERE id = ?');
    $checkIfQuestionExists->execute(array($idOfQuestion));

    // Recover data question
    if($checkIfQuestionExists->rowCount() > 0){
        // Recover data in an array
        $questionInfos = $checkIfQuestionExists->fetch();

        // Verify if question author id matches session id
        if($questionInfos['id_author'] == $_SESSION['id']){

            // Database question infos which are recovered 
            $question_title = $questionInfos['title'];
            $question_explanation = $questionInfos['explanation'];
            $question_content = $questionInfos['content'];

            $question_explanation = str_replace('<br />', '', $question_explanation);
            $question_content = str_replace('<br />', '', $question_content);
        
        // Error message to advertize user that he can not modify the question because she/he is not the author
        }else{
            $errorMsg = "You are not the author of this question. So you can not modify this question.";
        }
    
    // Error message to advertize user that he can not modify the question because it was not found in database
    }else{
        $errorMsg = "No question corresponding to the id_author and the id_session was found.";
    }

}else{
    // Error message to advertize user that ...
    $errorMsg = "No question was found.";
}
