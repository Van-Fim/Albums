<?
require_once __DIR__ . "/../autoload.php";
error_reporting(E_ERROR | E_PARSE);
$localAlbumId = $_POST["album_id"];
$localUser = $AuthSystem->GetUser();
$detail = $AlbumManager->getDetailAlbum($localAlbumId);
?>
<h4>
    <?= $detail["name"] ?>
</h4>
<p>
    <?= $detail["description"] ?>
</p>
<? if ($localUser['id'] > 0 && $localUser['id'] == $detail['user_id']) { ?>
    <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#addImage">Загрузить фото</button>
<? } ?>
<div id="albumImagesContainer" style="margin-top:25px;">

</div>