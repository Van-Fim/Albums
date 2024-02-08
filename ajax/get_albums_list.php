<?
require_once __DIR__ . "/../autoload.php";
$albums = $AlbumManager->getAllAlbums();
$localUser = $AuthSystem->GetUser();
?>
<div id="albumsList" class="row">
    <? while ($row = $albums->fetch_assoc()) { ?>
        <?$isLocalUser = $localUser['id'] > 0 && $localUser['id'] == $row['user_id'];?>
        <div class="col-sm-6" style="margin-top:25px;">
            <div class="card" style="">
                <div class="card-body">
                    <h5 class="card-title">
                        <?= $row['name'] ?>
                    </h5>
                    <p class="card-text">
                        <?= $row['description'] ?>
                    </p>
                    <button class="btn btn-primary" onclick="getAlbumDetail(<?= $row['id'] ?>, <?=intval($isLocalUser)?>)">Просмотреть</button>
                    <? if ($isLocalUser) { ?>
                        <button class="btn btn-primary" onclick="deleteAlbum(<?= $row['id'] ?>)">Удалить</button>
                    <? } ?>
                </div>
            </div>
        </div>
    <? } ?>
</div>