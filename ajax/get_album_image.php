<?
require_once __DIR__ . "/../autoload.php";
header('Content-Type: application/json');
$albumImage = $AlbumManager->getImage($_POST['id']);
echo json_encode($albumImage);
?>