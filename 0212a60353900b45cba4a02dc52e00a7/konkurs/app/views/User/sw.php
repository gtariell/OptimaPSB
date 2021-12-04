<div id="wrap">
    <div id="left" class="percs active">
        <div class="border-gradient border-gradient-p">
            <h3>Я ментор</h3>
            <p>Вещество привлекает тахионный максимум. Интеграл от функции, обращающейся в бесконечность в изолированной точке, исключая очевидный случай, независим. Комплексное число, очевидно, отражает невероятный резонатор. Среда когерентна.</p>
            <p class="text-center"><a href="/user/sw?sw=2" type="button" class="btn btn-primary btn-shadow">Войти</a></p>
        </div>
    </div>
    <div id="right" class="percs">
        <div class="border-gradient border-gradient-p">
            <h3>Я новичок</h3>
            <p>Вещество привлекает тахионный максимум. Интеграл от функции, обращающейся в бесконечность в изолированной точке, исключая очевидный случай, независим. Комплексное число, очевидно, отражает невероятный резонатор. Среда когерентна.</p>
            <p class="text-center"><a href="/user/sw?sw=1" type="button" class="btn btn-primary btn-shadow">Войти</a></p>
        </div>
    </div>

    <div class="block">
        <div class="logo"><img src="/logo.svg" alt=""></div>
        <h1 style="font-weight: 900;">Выберите персонажа</h1>
        <p><a class="link-light text-decoration-none" href="#" style="font-weight: 500;">Еще не зарегестрировались?</a></p>
        <p><a class="link-light text-decoration-none" href="#" style="font-weight: 700;">Создать аккаунт</a></p>
    </div>
</div>

<style>

    .percs > div {
        padding: 46px 66px;
        z-index: 10;

        background: radial-gradient(90.16% 143.01% at 15.32% 21.04%, rgba(233, 86, 22, 0.2) 0%, rgba(43, 45, 131, 0.108) 77.08%, rgba(43, 45, 131, 0.02) 100%);
        background-blend-mode: overlay, normal;
        backdrop-filter: blur(70px);

        display: none;
    }

    .form-signin {
        padding: 0;
    }
    #wrap {
        height: 790px;
    }
    #left, #right {
        display: block;
        position: absolute;
    }
    #left {
        top: 0;
        left: 122px;
        background: url(/images/login/left-0.png);
        width: 387px;
        height: 540px;
    }
    #left.active {
        background: url(/images/login/left-1.png);
    }
    #left  > div { left: 375px; top: 130px; }
    #right > div { right: 415px; bottom: 170px; }
    #left.active > div { display: block;}
    #right.active > div { display: block;}
    #right {
        bottom: 0;
        right: 21px;
        width: 355px;
        height: 537px;
        background: url(/images/login/right-0.png);
    }
    #right.active {
        background: url(/images/login/right-1.png);
    }
    .block {
        position: absolute;
        top: 550px;
        left: 90px;
    }
</style>

<script>
    $('body').on('click', '.percs', function () {
        $('.percs').removeClass('active')
        $(this).addClass('active')
    })
</script>