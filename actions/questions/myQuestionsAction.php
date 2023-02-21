<?php
// Call out database
require('actions/database.php');

$getAllMyQuestions = $bdd->prepare('SELECT id, title, explanation, content, publish_datetime FROM questions WHERE id_author = ? ORDER BY id DESC');
$getAllMyQuestions->execute(array($_SESSION['id']));
