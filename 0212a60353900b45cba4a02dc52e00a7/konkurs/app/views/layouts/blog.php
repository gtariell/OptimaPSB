<!doctype html>
<html lang="ru">
<head>
<?php
    $manifestPath = WWW.'/mix-manifest.json';
    $manifest = json_decode(file_get_contents($manifestPath), true);
?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="<?= $manifest['/css/app.css'] ?>">
</head>
<body>
<div class="container wrapper">
    <div class="wrapper-border border-gradient border-gradient-w"></div>
    <header class="navbar navbar-dark row flex-md-nowrap mb-4">
        <div class="container-fluid">
            <a class="navbar-brand text-end col-md-4 col-lg-3 px-3" href="/">
                <img src="/logo.svg" alt="" height="38">
            </a>
            <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="input-group">
                <button class="btn btn-dark rounded dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">RU</button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Русский</a></li>
                    <li><a class="dropdown-item" href="#">English</a></li>
                </ul>
                <button class="btn" type="button" id="button-addon1" style="position: absolute;left: 63px;z-index: 4;"><img src="/images/search.svg" alt=""></button>
                <input type="text" class="form-control border-0" placeholder="поиск" aria-label="Search" style="padding-left: 45px">
            </div>
<!--            <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">-->
            <ul class="navbar-nav px-3 flex-row">
                <li class="nav-item ms-4">
                    <a class="nav-link" href="/rating"><img src="/images/icons/leaderboard.svg" alt="" height="34"></a>
                </li>
                <li class="nav-item ms-5">
                    <a class="nav-link" href="/shop"><img src="/images/icons/purchase.svg" alt="" height="34"></a>
                </li>
                <li class="nav-item ms-3">
                    <a class="nav-link" href="/user/logout"><img src="/images/icons/exit.svg" alt="" height="34"></a>
                </li>
            </ul>
        </div>
    </header>
    <div class="container-xl pb-4">
        <?php if ($this->route['action']=='rating'): echo $content;
        else: ?>
        <div class="row">
            <nav id="sidebarMenu" class="col-md-4 col-lg-3 d-md-block sidebar collapse">
                <div class="position-sticky">
<!--                    <div class="input-group flex-nowrap">-->
<!--                        <button class="btn btn-secondary rounded dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">RU</button>-->
<!--                        <ul class="dropdown-menu">-->
<!--                            <li><a class="dropdown-item" href="#">Русский</a></li>-->
<!--                            <li><a class="dropdown-item" href="#">English</a></li>-->
<!--                        </ul>-->
<!--                        <button class="btn" type="button" id="button-addon1" style="position: absolute;left: 63px;z-index: 4;"><img src="/images/search.svg" alt=""></button>-->
<!--                        <input class="form-control border-0 w-100" type="text" placeholder="Поиск" aria-label="Search" style="padding-left: 45px">-->
<!--                    </div>-->

                    <div class="side-user">
                        <a href="/"><img src="/images/icons/back.svg" height="90" alt=""></a>
                        <div class="overlay">
                            <div class="perc">
                                <img class="float-end" src="/images/side-perc.png?q=1" alt="" width="80%">
                            </div>
                            <div class="text-start px-2 mb-2">Добро <br>пожаловать</div>
<!--                            <div class="button text-center">-->
<!--                                <span type="button" class="btn btn-primary btn-block">rssllrrk89</span>-->
<!--                            </div>-->
                            <div class="d-grid gap-2">
                                <a href="/profile" class="btn btn-primary" type="button">rssllrrk89</a>
                            </div>
                        </div>
                    </div>

                    <ul class="side-menu nav flex-column mt-3">
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center <?=$this->route['action']=='tasks'?'active':''?>" aria-current="page" href="/tasks">
                                <img src="/images/icons/menu.svg" height="44" alt="">
                                <span class="flex-grow-1 text-center">Задачи</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center <?=$this->route['action']=='project'?'active':''?>" href="/project">
                                <img src="/images/icons/home.svg" height="44" alt="">
                                <span class="flex-grow-1 text-center">Проект</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center <?=$this->route['action']=='crew'?'active':''?>" href="/crew">
                                <img src="/images/icons/play.svg" height="44" alt="">
                                <span class="flex-grow-1 text-center">Команда</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center <?=$this->route['action']=='company'?'active':''?>" href="/company">
                                <img src="/images/icons/university.svg" height="44" alt="">
                                <span class="flex-grow-1 text-center">Компания</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center <?=$this->route['action']=='calendar'?'active':''?>" href="/calendar">
                                <img src="/images/icons/calendar.svg" height="44" alt="">
                                <span class="flex-grow-1 text-center">Календарь</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center <?=$this->route['action']=='kanban'?'active':''?>" href="/kanban">
                                <img src="/images/icons/share.svg" height="44" alt="">
                                <span class="flex-grow-1 text-center">Kanban</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="col-md-8 col-lg-9 mb-n4">
                <?=/** @var $content */ $content ?>
            </main>
        </div>
        <?php endif; ?>
    </div>
    <div class="container-fluid">
        <footer class=" border-top mb-4">
            <div class="container d-flex flex-wrap justify-content-between align-items-center py-4 small">
                <div class="col">
                    <div class="d-grid gap-2 px-5">
                        <a href="/chat" class="btn btn-primary btn-shadow" type="button">Чат</a>
                    </div>
                </div>
                <p class="col mb-0 small" style="line-height: 1.2;"></p>

                <div class="col-auto mx-md-auto text-center px-3 mb-3">
                    <div class="text-start mb-2">Следите за нами:</div>
                    <div>
                        <a href="/" class="btn btn-outline-light btn-sm rounded-pill small text-muted">
                            <img src="/images/envelope.svg" alt="" height="12">
                            Подписаться на обновления
                            <img class="ms-5" src="/images/right.svg" alt="" height="12">
                        </a>
                    </div>
                </div>

                <ul class="nav col justify-content-center">
                    <li class="nav-item"><a href="#" class="nav-link px-2"><img src="/images/social/instagram.svg" alt=""></a></li>
                    <li class="nav-item"><a href="#" class="nav-link px-2"><img src="/images/social/youtube.svg" alt=""></a></li>
                    <li class="nav-item"><a href="#" class="nav-link px-2"><img src="/images/social/facebook.svg" alt=""></a></li>

                </ul>
                <div class="col"></div>
            </div>
        </footer>
    </div>
</div>

<script src="<?= $manifest['/js/app.js'] ?>"></script>
<?php
foreach($scripts as $script){
    echo $script;
}
?>
</body>
</html>