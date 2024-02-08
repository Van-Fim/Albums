<?
require_once __DIR__ . "/autoload.php";

$localUser = $AuthSystem->GetUser();
$localUrl = parse_url($_SERVER['REQUEST_URI']);
?>

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <header>
        <nav id="top-navbar" class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <a class="navbar-brand" href="/">Все альбомы</a>
                        <? if ($localUser['id'] != 0 && $localUrl['path'] == '/') { ?>
                            <li class="nav-item">
                                <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                                    data-bs-target="#addAlbum">Создать
                                    альбом</button>
                            </li>
                        <? } ?>
                    </ul>
                    <ul class="navbar-nav">
                        <? if ($localUser['id'] == 0) { ?>
                            <li class="nav-item">
                                <button class="btn" type="button" data-bs-toggle="modal"
                                    data-bs-target="#loginUser">Вход</button>
                            </li>
                            <li class="nav-item">
                                <button class="btn" type="button" data-bs-toggle="modal"
                                    data-bs-target="#registerUser">Регистрация</button>
                            </li>
                        <? } else { ?>
                            <li class="nav-item">
                                <div class="btn"><?= $localUser['login'] ?></div>
                            </li>
                            <li class="nav-item">
                                <button class="btn" type="button" onclick="logoutUser()">выход</button>
                            </li>
                        <? } ?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main>