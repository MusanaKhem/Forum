<?php 

require('actions/database.php');

if(isset($_POST['validate'])){

    if(!empty($_POST['object']) AND !empty(['description']) AND !empty(['content'])){

        $question_object = nl2br(htmlspecialchars($_POST['object']));
        $question_description = nl2br(htmlspecialchars($_POST['description']));
        $question_content = nl2br(htmlspecialchars($_POST['content']));
        $question_date = date('d/m/Y');
        $question_time = time();
        $question_id_author = $_SESSION['id'];
        $question_pseudo_author = $_SESSION['pseudo'];
    
        $insertQuestionOnWebsite = $bdd->prepare('INSERT INTO questions(object, description, content, publish_date, publish_time, id_author, pseudo_author)');
        $insertQuestionOnWebsite->execute(array('');)

    }else{
        $errorMsg = "Please complete all the fields...";
    }

}

