<?php

// Call out database
require('actions/database.php');

// Verify if user correctly click on the validate button to post his answer
if(isset($_POST['validate'])){

    // Verify if user correctly posted his answer
    if(!empty($_POST['answer'])){

        // Allow user to insert line breaks
        $user_answer = nl2br(htmlspecialchars($_POST['answer']));

        $insertAnswer = $bdd->prepare('INSERT INTO answers(id_author, pseudo_author, id_question, content)VALUES(?, ?, ?, ?)');
        $insertAnswer->execute(array($_SESSION['id'], $_SESSION['pseudo'], $idOfTheQuestion, $user_answer));
    }
}