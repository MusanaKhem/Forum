<!-- securityAction's part's code -- redirection to login page if user isn't authenticated -->
<?php
session_start();
if(!isset($_SESSION['auth'])){
    header('Location: login.php');
}