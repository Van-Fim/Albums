<?
require_once __DIR__ . "/../autoload.php";
if($_POST['type']=='login')
    $AuthSystem->loginUser($_POST['login'], $_POST['password']);
else if($_POST['type']=='logout')
    $AuthSystem->logoutUser();
?>