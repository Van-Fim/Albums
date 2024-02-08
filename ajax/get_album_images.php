<?
require_once __DIR__ . "/../autoload.php";
$albumImages = $AlbumManager->getAlbumImages($_POST['album_id']);
$localUser = $AuthSystem->GetUser();
?>
<div id="imagesList" class="row">
    <? while ($row = $albumImages->fetch_assoc()) { ?>
        <?
        $isLocalUser = $localUser['id'] > 0 && $_POST['album_id'] == $row['album_id'];
        $comments = $AlbumManager->getImageComments($row['id'])->fetch_all();
        $likes = $AlbumManager->getImageLikes($row['id']);
        ?>
        <div class="col-sm-3" style="margin-top:25px;">
            <div class="card" style="width: 18rem;">
                <a class="album-image" data-bs-toggle="modal" data-id="<?= $row['id'] ?>"
                    data-bs-target="#full_size_image_modal">
                    <img src="<?= $row['path'] ?>" class="figure-img img-fluid border border-dark"
                        alt="<?= $row['name'] ?>">
                </a>
                <div class="card-body">
                    <h5 class="card-title">
                        <?= $row['name'] ?>
                    </h5>
                    <div class="row" style="margin-bottom:25px">
                        <div class="col-md-3">
                            <div>
                                <svg fill="grey" height="22px" width="22px" version="1.1" id="Capa_1"
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    viewBox="0 0 486.926 486.926" xml:space="preserve">
                                    <g>
                                        <path d="M462.8,181.564c-12.3-10.5-27.7-16.2-43.3-16.2h-15.8h-56.9h-32.4v-75.9c0-31.9-9.3-54.9-27.7-68.4
        c-29.1-21.4-69.2-9.2-70.9-8.6c-5,1.6-8.4,6.2-8.4,11.4v84.9c0,27.7-13.2,51.2-39.3,69.9c-19.5,14-39.4,20.1-41.5,20.8l-2.9,0.7
        c-4.3-7.3-12.2-12.2-21.3-12.2H24.7c-13.6,0-24.7,11.1-24.7,24.7v228.4c0,13.6,11.1,24.7,24.7,24.7h77.9c7.6,0,14.5-3.5,19-8.9
        c12.5,13.3,30.2,21.6,49.4,21.6h65.9h6.8h135.1c45.9,0,75.2-24,80.4-66l26.9-166.9C489.8,221.564,480.9,196.964,462.8,181.564z
         M103.2,441.064c0,0.4-0.3,0.7-0.7,0.7H24.7c-0.4,0-0.7-0.3-0.7-0.7v-228.4c0-0.4,0.3-0.7,0.7-0.7h77.9c0.4,0,0.7,0.3,0.7,0.7
        v228.4H103.2z M462.2,241.764l-26.8,167.2c0,0.1,0,0.3-0.1,0.5c-3.7,29.9-22.7,45.1-56.6,45.1H243.6h-6.8h-65.9
        c-21.3,0-39.8-15.9-43.1-36.9c-0.1-0.7-0.3-1.4-0.5-2.1v-191.6l5.2-1.2c0.2,0,0.3-0.1,0.5-0.1c1-0.3,24.7-7,48.6-24
        c32.7-23.2,49.9-54.3,49.9-89.9v-75.3c10.4-1.7,28.2-2.6,41.1,7c11.8,8.7,17.8,25.2,17.8,49v87.8c0,6.6,5.4,12,12,12h44.4h56.9
        h15.8c9.9,0,19.8,3.7,27.7,10.5C459,209.864,464.8,225.964,462.2,241.764z" />
                                    </g>
                                </svg>
                                <span style="
    display: inline-block;
    height: 22px;
">
                                    <?= count($likes["LIKES"]) ?>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div>
                                <svg fill="grey" height="22px" width="22px" version="1.1" id="Capa_1"
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    viewBox="0 0 486.805 486.805" xml:space="preserve">
                                    <g>
                                        <path d="M485.9,241.402l-26.8-167c-5.2-41.9-34.5-66-80.4-66H243.6h-6.8h-65.9c-19.2,0-36.9,8.3-49.4,21.6
        c-4.5-5.5-11.4-8.9-19-8.9H24.7c-13.6,0-24.7,11.1-24.7,24.7v228.4c0,13.6,11.1,24.7,24.7,24.7h77.9c9,0,17-4.9,21.3-12.2l2.9,0.7
        c4.4,1.3,80.8,25,80.8,90.7v84.9c0,5.2,3.4,9.9,8.4,11.4c0.9,0.3,12.9,4,28.3,4c13.3,0,29.1-2.7,42.5-12.6
        c18.4-13.5,27.7-36.5,27.7-68.4v-75.8h32.4h56.9h15.8c15.6,0,31-5.8,43.3-16.2C480.9,290.002,489.8,265.402,485.9,241.402z
         M103.2,274.302c0,0.4-0.3,0.7-0.7,0.7H24.7c-0.4,0-0.7-0.3-0.7-0.7v-228.4c0-0.4,0.3-0.7,0.7-0.7h77.9c0.4,0,0.7,0.3,0.7,0.7
        v228.4H103.2z M447.3,287.202c-7.9,6.8-17.8,10.5-27.7,10.5h-15.8h-56.9h-44.5c-6.6,0-12,5.4-12,12v87.8c0,23.8-6,40.3-17.8,49
        c-13,9.6-30.8,8.6-41.1,7v-75.3c0-35.6-17.3-66.7-49.9-89.9c-23.9-16.9-47.6-23.7-48.6-24c-0.2,0-0.3-0.1-0.5-0.1l-5.2-1.2v-191.5
        c0.2-0.7,0.4-1.4,0.5-2.1c3.3-21,21.8-36.9,43.1-36.9h65.9h6.8h135.1c33.9,0,52.9,15.2,56.6,45.1c0,0.2,0,0.3,0.1,0.4l26.9,167.1
        C464.8,261.002,459,277.102,447.3,287.202z" />
                                    </g>
                                </svg>
                                <span style="
    display: inline-block;
    height: 22px;
">
                                    <?= count($likes["DISLIKES"]) ?>
                                </span>
                            </div>
                        </div>
                    </div>
                    <p class="card-text">
                        Комментарии: <?= count($comments) ?>
                    </p>
                    <p class="card-text">
                        <?= $row['description'] ?>
                    </p>
                </div>
            </div>
        </div>
    <? } ?>
</div>