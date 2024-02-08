<?
require_once __DIR__ . "/../autoload.php";
$comments = $AlbumManager->getImageComments($_POST['image_id']);
$localUser = $AuthSystem->GetUser();
?>
<ul class="list-group list-group-flush">
    <? while ($row = $comments->fetch_assoc()) { ?>
        <?
        $user = $AuthSystem->GetUserById($row['user_id']);
        ?>
        <li class="list-group-item">
            <h5 class="card-title">
                <?= $user['login'] ?>
            </h5>
            <p>
                <?= $row['comment'] ?>
            </p>
        </li>
    <? } ?>
    <? if ($localUser['id'] > 0) { ?>
        <li class="list-group-item">
            <label for="imageCommentInput" class="form-label">Ваш комментарий</label>
            <textarea class="form-control" id="imageCommentInput" rows="3" style="margin-bottom:20px"></textarea>
            <button class="btn btn-primary" onclick="sendComment(<?=$_POST['image_id']?>)">Оставить
                комментарий</button>
        </li>
    <? } ?>
</ul>