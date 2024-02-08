<?
require_once __DIR__ . "/../autoload.php";
$AlbumManager->addComment($_POST['image_id'], $_POST['comment']);
?>