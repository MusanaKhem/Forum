<!-- securityAction's part's code -- redirection to login page if user isn't authenticated -->
<?php
if(!isset($_SESSION['auth'])){
    header('Location: login.php');
}