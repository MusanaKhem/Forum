<?php

// Call out database
require('actions/database.php');

// Get all the answers info
$getAllAnswersOfThisQuestion = $bdd->prepare('SELECT id_author, pseudo_author, id_question, content FROM answers WHERE id_question = ? ORDER BY id DESC');

// Get all the selected question's answers - Answers are selected using the question id
$getAllAnswersOfThisQuestion->execute(array($idOfTheQuestion));

