<?php

require('actions/database.php');

//Verify if validate button has been correctly push on by user
if(isset($_POST['validate'])){

    //Verify if title, explanation and content fields are not empty
    if(!empty($_POST['title']) AND !empty($_POST['explanation']) AND !empty($_POST['content'])){

        //Question data which are needed in the query
        $new_question_title = htmlspecialchars($_POST['title']);
        $new_question_explanation = nl2br(htmlspecialchars($_POST['explanation']));
        $new_question_content = nl2br(htmlspecialchars($_POST['content']));

        //Modify question information which has a correct and known id in URL parameter
        $editQuestionOnWebsite = $bdd->prepare('UPDATE questions SET title = ?, explanation = ?, content = ? WHERE id = ?');
        $editQuestionOnWebsite->execute(array($new_question_title, $new_question_explanation, $new_question_content, $idOfQuestion));

        //User is redirected to my questions page
        header('Location: my-questions.php');

    //Error message to alert user when the fields are not all complete
    }else{
        $errorMsg = "Please complete all the fields";
    }

}