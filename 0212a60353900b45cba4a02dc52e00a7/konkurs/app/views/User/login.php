<div class="row">
    <div class="col-md-5 d-flex flex-column p-0">
        <div class="logo"><img src="/logo.svg" alt=""></div>

        <form method="post" action="/user/login">
            <h1 class="mt-md-auto mb-3">Вход</h1>
            <div class="mb-3 small">
                <label for="login" class="form-label">Почта</label>
                <input value="1@1.com" type="email" name="login" class="form-control" id="login" placeholder="Введите адрес электронной почты...." required>
            </div>
            <div class="mb-4 small">
                <label for="pasword" class="form-label">Пароль</label>
                <input value="123321" type="password" name="password" class="form-control" id="pasword" placeholder="Введите пароль...." required>
            </div>
            <div class="row mt-auto small justify-content-around align-items-center mb-3">
                <div class="col d-grid gap-2">
                    <button type="submit" class="btn btn-primary">Войти</button>
                </div>
                <div class="col">
                    <a class="link-light" href="#">Забыли пароль?</a>
                </div>
            </div>
        </form>

        <div class="row mt-md-auto small align-items-center">
            <div class="col p-0">
                <small>Еще не зарегестрировались?</small>
            </div>
            <div class="col d-grid gap-2">
                <a href="#" class="btn btn-primary">Создать аккаунт</a>
            </div>
        </div>
    </div>
    <div class="col-md-7 position-relative">
        <img class="perc" src="/images/perc.png" width="80%" alt="">
    </div>
</div>