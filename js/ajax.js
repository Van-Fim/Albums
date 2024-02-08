$(document).ready(function () {
    $(document).on("click", ".album-image", function () {
        getAlbumImage($(this).data('id'));
        getImageLikes($(this).data('id'));
        getImageComments($(this).data('id'));
    });
});

var registerUser = function () {
    var login = $("#registerUserLoginInput").val()
    var password = $("#registerUserPasswordInput").val()
    $.ajax({
        url: '/ajax/register_user.php',
        method: 'post',
        dataType: 'html',
        data: { login: login, password: password },
        success: function (data) {
            $('#albumContainer').html('<h4>Успешно зарегистрирован!<h4/>');
        }
    });
};
var loginUser = function () {
    var login = $("#loginUserLoginInput").val();
    var password = $("#loginUserPasswordInput").val();
    $.ajax({
        url: '/ajax/login_user.php',
        method: 'post',
        dataType: 'html',
        data: { login: login, password: password, type:'login' },
        success: function (data) {
            location.reload();
        }
    });
};
var logoutUser = function () {
    $.ajax({
        url: '/ajax/login_user.php',
        method: 'post',
        dataType: 'html',
        data: { type:'logout' },
        success: function (data) {
            location.reload();
        }
    });
};
var addAlbum = function () {
    var name = $("#albumNameInput").val();
    var description = $("#albumDescInput").val();
    $.ajax({
        url: '/ajax/add_album.php',
        method: 'post',
        dataType: 'html',
        data: { name: name, description: description },
        success: function (data) {
            getAlbums();
        }
    });
};
var addImage = function () {
    var name = $("#imageNameInput").val();
    var description = $("#imageDescInput").val();
    var album_id = $("#imageAlbumId").val();
    var formData = new FormData();
    formData.append('file', $("#imageFileInput")[0].files[0]);
    formData.append('album_id', album_id);
    formData.append('name', name);
    formData.append('description', description);
    $.ajax({
        url: '/ajax/add_image.php',
        method: 'post',
        cache: false,
        contentType: false,
        processData: false,
        data: formData,
        success: function (data) {
            getAlbumDetail(album_id);
        }
    });
};
var getAlbumImage = function (id) {
    $.ajax({
        url: '/ajax/get_album_image.php',
        method: 'post',
        dataType: 'json',
        data: { id: id },
        success: function (data) {
            $('#image-title').html(data['name']);
            $('#image-description').html(data['description']);
            $('#full-view-img').attr('src', data['path']);
        }
    });
};
var getAlbumImages = function (id) {
    $.ajax({
        url: '/ajax/get_album_images.php',
        method: 'post',
        dataType: 'html',
        data: { album_id: id },
        success: function (data) {
            $('#albumImagesContainer').html(data);
        }
    });
};
var getAlbumDetail = function (id, isLocalUser) {
    if (isLocalUser == 1)
        $("#imageAlbumId").val(id);
        $("#hiddenAlbumId").val(id);
    $.ajax({
        url: '/ajax/get_album_detail.php',
        method: 'post',
        dataType: 'html',
        data: { album_id: id },
        success: function (data) {
            $('#albumContainer').html(data);
            getAlbumImages(id);
        }
    });
};
var getAlbums = function () {
    $.ajax({
        url: '/ajax/get_albums_list.php',
        method: 'post',
        dataType: 'html',
        success: function (data) {
            $('#albumContainer').html(data);
        }
    });
};
var deleteAlbum = function (id) {
    $.ajax({
        url: '/ajax/delete_album.php',
        method: 'post',
        dataType: 'html',
        data: { id: id },
        success: function (data) {
            getAlbums();
        }
    });
};
var deleteImage = function (id) {
    var album_id = $("#imageAlbumId").val();
    $.ajax({
        url: '/ajax/delete_image.php',
        method: 'post',
        dataType: 'html',
        data: { id: id, album_id: album_id },
        success: function (data) {
            getAlbumDetail(album_id);
        }
    });
};
var getImageLikes = function (id) {
    $.ajax({
        url: '/ajax/get_likes.php',
        method: 'post',
        dataType: 'html',
        data: { image_id: id },
        success: function (data) {
            $('#likes').html(data);
            getAlbumImages($("#hiddenAlbumId").val());
        }
    });
};
var getImageComments = function (id) {
    $.ajax({
        url: '/ajax/get_comments.php',
        method: 'post',
        dataType: 'html',
        data: { image_id: id },
        success: function (data) {
            $('#comments').html(data);
            getAlbumImages($("#hiddenAlbumId").val());
        }
    });
};
var sendComment = function (image_id) {
    var comment = $("#imageCommentInput").val();
    $.ajax({
        url: '/ajax/add_comment.php',
        method: 'post',
        dataType: 'html',
        data: { image_id: image_id, comment: comment },
        success: function (data) {
            getImageLikes(image_id);
            getImageComments(image_id);
        }
    });
};
var updateLike = function (image_id, type) {
    $.ajax({
        url: '/ajax/update_like.php',
        method: 'post',
        dataType: 'html',
        data: { image_id: image_id, type:type },
        success: function (data) {
            getImageLikes(image_id);
        }
    });
};