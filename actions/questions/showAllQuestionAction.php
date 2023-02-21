<?php
// Call out database

require('actions/database.php');

// Recover all information questions without user's search
$getAllQuestions = $bdd->query('SELECT id, id_author, title, explanation, pseudo_author, publish_datetime FROM questions ORDER BY id DESC LIMIT 0,5');

// Verify if search bar is not empty and if user has already complete and enter its search
if(isset($_GET['search']) AND !empty($_GET['search'])){

    // Get user research
    $userSearch = $_GET['search'];

    // Compare user entry to titles which are in database
    $getAllQuestions = $bdd->query('SELECT id, id_author, title, explanation, pseudo_author, publish_datetime FROM questions WHERE title LIKE "%'.$userSearch.'%" ORDER BY id DESC');
}

