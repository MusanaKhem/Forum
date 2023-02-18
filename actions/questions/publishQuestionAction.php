<?php 

require('actions/database.php');

if(isset($_POST['validate'])){

    if(!empty($_POST['title']) AND !empty($_POST['explanation']) AND !empty($_POST['content'])){

        $question_title = nl2br(htmlspecialchars($_POST['title']));
        $question_explanation = nl2br(htmlspecialchars($_POST['explanation']));
        $question_content = nl2br(htmlspecialchars($_POST['content']));
        $question_dateTime = date('d/m/Y H:i:s');
        $question_id_author = $_SESSION['id'];
        $question_pseudo_author = $_SESSION['pseudo'];
    
        $insertQuestionOnWebsite = $bdd->prepare('INSERT INTO questions(title, explanation, content, publish_datetime, id_author, pseudo_author)VALUES(?, ?, ?, ?, ?, ?)');
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

        $successMsg = "Your question has been correctly published on the website";

    }else{
        $errorMsg = "Please complete all the fields...";
    }
}

