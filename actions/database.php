<?php
try{
    session_start();
    $bdd = new PDO('mysql:host=localhost;dbname=Forum;charset=utf8;', 'root', 'root');
}catch(Exception $e){
    die('An error was found : '. $e->getMessage());
}
