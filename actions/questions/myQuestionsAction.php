<?php

require('actions/database.php'); //

$getAllMyQuestions = $bdd->prepare('SELECT id, titre, explanation FROM questions WHERE id_author = ?');
$getAllMyQuestions->exectue(array($_SESSION['id']));
