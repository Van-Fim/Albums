</main>
<footer class="text-muted py-5">

</footer>
<div class="modal fade" id="addAlbum" tabindex="-1" aria-labelledby="addAlbumLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="mb-3">
                    <label for="albumNameInput" class="form-label">Название</label>
                    <input type="text" class="form-control" id="albumNameInput">
                </div>
                <div class="mb-3">
                    <label for="albumDescInput" class="form-label">Описание</label>
                    <textarea class="form-control" id="albumDescInput" rows="3"></textarea>
                </div>
                <div class="container-fluid text-center">
                    <button class="btn btn-primary" type="button" onclick="addAlbum()"
                        data-bs-dismiss="modal">Создать</button>
                    <button class="btn btn-primary" type="button" data-bs-dismiss="modal">Отмена</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="addImage" tabindex="-1" aria-labelledby="addImageLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <input type="hidden" id="imageAlbumId">
                <div class="mb-3">
                    <label for="imageNameInput" class="form-label">Название</label>
                    <input type="text" class="form-control" id="imageNameInput">
                </div>
                <div class="mb-3">
                    <label for="imageDescInput" class="form-label">Описание</label>
                    <textarea class="form-control" id="imageDescInput" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label for="imageFileInput" class="form-label">Изображение</label>
                    <input type="file" class="form-control" id="imageFileInput">
                </div>
                <div class="container-fluid text-center">
                    <button class="btn btn-primary" type="button" onclick="addImage()"
                        data-bs-dismiss="modal">Ок</button>
                    <button class="btn btn-primary" type="button" data-bs-dismiss="modal">Отмена</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="registerUser" tabindex="-1" aria-labelledby="registerUserLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="mb-3">
                    <label for="registerUserLoginInput" class="form-label">Логин</label>
                    <input type="text" class="form-control" id="registerUserLoginInput">
                </div>
                <div class="mb-3">
                    <label for="registerUserPasswordInput" class="form-label">Пароль</label>
                    <input type="password" class="form-control" id="registerUserPasswordInput">
                </div>
                <div class="container-fluid text-center">
                    <button class="btn btn-primary" type="button" onclick="registerUser()"
                        data-bs-dismiss="modal">ОК</button>
                    <button class="btn btn-primary" type="button" data-bs-dismiss="modal">Отмена</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="loginUser" tabindex="-1" aria-labelledby="loginUserLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="mb-3">
                    <label for="loginUserLoginInput" class="form-label">Логин</label>
                    <input type="text" class="form-control" id="loginUserLoginInput">
                </div>
                <div class="mb-3">
                    <label for="loginUserPasswordInput" class="form-label">Пароль</label>
                    <input type="password" class="form-control" id="loginUserPasswordInput">
                </div>
                <div class="container-fluid text-center">
                    <button class="btn btn-primary" type="button" onclick="loginUser()"
                        data-bs-dismiss="modal">ОК</button>
                    <button class="btn btn-primary" type="button" data-bs-dismiss="modal">Отмена</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="full_size_image_modal" class="modal">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 id="image-title">
                </h5>
            </div>
            <div class="modal-body">
                <input type="hidden" id="hiddenAlbumId">
                <img id="full-view-img" class="figure-img img-fluid border border-dark">
                <div id="likes" class="container-fluid">
                </div>
                <div id="image-description" class="container-fluid" style="margin-bottom:20px">
                </div>
                <h5>Комментарии</h5>
                <div id="comments">

                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
    integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
    crossorigin="anonymous"></script>
<script src="/js/ajax.js"></script>
</body>