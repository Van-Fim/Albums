<?
require_once __DIR__ . "/../autoload.php";
$AuthSystem->registerUser($_POST['login'], $_POST['password']);
?>