<?php 

require('actions/database.php');

// Validate the form
if(isset($_POST['validate'])){
    
    // Verify if all the fields are not empty
    if(!empty($_POST['title']) AND !empty($_POST['explanation']) AND !empty($_POST['content'])){
        
        // Here question data
        $question_title = nl2br(htmlspecialchars($_POST['title']));
        $question_explanation = nl2br(htmlspecialchars($_POST['explanation']));
        $question_content = nl2br(htmlspecialchars($_POST['content']));
        $question_dateTime = date('d/m/Y H:i:s');
        $question_id_author = $_SESSION['id'];
        $question_pseudo_author = $_SESSION['pseudo'];

        // Query to INSERT all information at the right place in the database
        $insertQuestionOnWebsite = $bdd->prepare('INSERT INTO questions(title, explanation, content, publish_datetime, id_author, pseudo_author)VALUES(?, ?, ?, ?, ?, ?)');
        // Coding part to execute 'INSERT INTO' query -- all information concerning the published question are register in a database
        $insertQuestionOnWebsite->execute(
            array(
                $question_title,
                $question_explanation,
                $question_content,
                $question_dateTime,
                $question_id_author,
                $question_pseudo_author
            )
        );
        // Message to confirm that question was correctly published
        $successMsg = "Your question has been correctly published on the website";
    
    // Message to advertise user that she/he might complete all the fields
    }else{
        $errorMsg = "Please complete all the fields...";
    }
}

