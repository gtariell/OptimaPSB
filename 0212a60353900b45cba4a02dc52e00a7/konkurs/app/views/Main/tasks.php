<table id="tasks" class="table">
    <thead>
        <tr>
        <td>Программа</td>
        <td>Продукт / проект</td>
        <td>Статус</td>
        <td>Прогресс</td>
        <td>Период</td>
    </tr>
    </thead>
    <tbody>
        <tr>
        <td>Знакомство с офисом</td>
        <td>Управление проектами / Оптима</td>
        <td>К&nbsp;выполнению</td>
        <td><img src="/images/tmp/table-progress.svg" alt=""></td>
        <td>01.12.2021/
            01.12.2022</td>
        </tr>
        <tr>
            <td>Ознакомление с должностной инструкцией</td>
            <td>Управление проектами / Оптима</td>
            <td>К&nbsp;выполнению</td>
            <td><img src="/images/tmp/table-progress.svg" alt=""></td>
            <td>01.12.2021/
                01.12.2022</td>
        </tr>
        <tr>
            <td>Прохождение обязательного инструктажа</td>
            <td>Управление проектами / Оптима</td>
            <td>К&nbsp;выполнению</td>
            <td><img src="/images/tmp/table-progress.svg" alt=""></td>
            <td>01.12.2021/
                01.12.2022</td>
        </tr>
        <tr>
            <td>Оформление базовых доступов</td>
            <td>Управление проектами / Оптима</td>
            <td>К&nbsp;выполнению</td>
            <td><img src="/images/tmp/table-progress.svg" alt=""></td>
            <td>01.12.2021/
                01.12.2022</td>
        </tr>
        <tr>
            <td>Доступы в площадкам разработки и тестирование</td>
            <td>Управление проектами / Оптима</td>
            <td>К&nbsp;выполнению</td>
            <td><img src="/images/tmp/table-progress.svg" alt=""></td>
            <td>01.12.2021/
                01.12.2022</td>
        </tr>
        <tr>
            <td>Что тебе доступно в банке</td>
            <td>Управление проектами / Оптима</td>
            <td>К&nbsp;выполнению</td>
            <td><img src="/images/tmp/table-progress.svg" alt=""></td>
            <td>01.12.2021/
                01.12.2022</td>
        </tr>
        <tr>
            <td>Что требуется от тебя</td>
            <td>Управление проектами / Оптима</td>
            <td>К&nbsp;выполнению</td>
            <td><img src="/images/tmp/table-progress.svg" alt=""></td>
            <td>01.12.2021/
                01.12.2022</td>
        </tr>
        <tr>
            <td>Правила героев ПСБ</td>
            <td>Управление проектами / Оптима</td>
            <td>К&nbsp;выполнению</td>
            <td><img src="/images/tmp/table-progress.svg" alt=""></td>
            <td>01.12.2021/
                01.12.2022</td>
        </tr>
        <tr>
            <td>Возможности, которые предоставляет банк</td>
            <td>Управление проектами / Оптима</td>
            <td>К&nbsp;выполнению</td>
            <td><img src="/images/tmp/table-progress.svg" alt=""></td>
            <td>01.12.2021/
                01.12.2022</td>
        </tr>
        <tr>
            <td>Знакомство с активностями</td>
            <td>Управление проектами / Оптима</td>
            <td>К&nbsp;выполнению</td>
            <td><img src="/images/tmp/table-progress.svg" alt=""></td>
            <td>01.12.2021/
                01.12.2022</td>
        </tr>
        <tr>
            <td>Обучение и развитие</td>
            <td>Управление проектами / Оптима</td>
            <td>К&nbsp;выполнению</td>
            <td><img src="/images/tmp/table-progress.svg" alt=""></td>
            <td>01.12.2021/
                01.12.2022</td>
        </tr>
        <tr>
            <td>Социальный пакет</td>
            <td>Управление проектами / Оптима</td>
            <td>К&nbsp;выполнению</td>
            <td><img src="/images/tmp/table-progress.svg" alt=""></td>
            <td>01.12.2021/
                01.12.2022</td>
        </tr>
        <tr>
            <td>Опрос по изученному материалу</td>
            <td>Управление проектами / Оптима</td>
            <td>К&nbsp;выполнению</td>
            <td><img src="/images/tmp/table-progress.svg" alt=""></td>
            <td>01.12.2021/
                01.12.2022</td>
        </tr>
    </tbody>
</table>

<style>
    .swal2-container.swal2-center>.swal2-popup {
        border-radius: 40px;
    }

    .swal2-html-container {
        color: white;
        font-size: .9em;
        text-align: left;
    }
</style>

<script>
    // var myModal = new bootstrap.Modal(document.getElementById('exampleModal'), {
    //     // keyboard: false,
    //     backdrop: false
    // })
    //
    // document.getElementById('exampleModal').addEventListener('hide.bs.modal', function () {
    //     $('tr').removeClass('active')
    // })
    //
    // // let myModal = document.getElementById('exampleModal')
    // import Swal from "sweetalert2";

    $('#tasks tbody').on('click','tr', function () {
        $(this).addClass('active')

        Swal.fire({
            padding: '0',
            showConfirmButton: false,
            width: 965,
            didClose: DeleteUnsavedImages,
            background: 'rgba(0,0,0,.9) url(/images/tmp/modal.svg) no-repeat center center / cover',
            html: `<div style="width: 925px; height: 466px; padding: 20px;" class="row">
                        <div class="col-4" style="position:relative;">
                            <h3 class="mb-3">Знакомство с офисом!</h3>
                            <p>Ура! Вот и случилось, мы наконец-то нашли недостающее звено. Пора его познакомить с нашим офисом </p>
                            <img src="/images/tmp/perc-modal.png" alt="" width="90%" style="position: absolute;bottom: -17px;">
                        </div>
                        <div class="col-8">
                            <img src="/images/tmp/modal-video.png" alt="" width="100%" style="cursor: pointer">
                            <div class="row align-items-center mt-3">
                                <div class="col-8">
                                    <div class="d-grid gap-2">
                                        <a href="#" class="btn btn-primary btn-shadow">Отправить видеообзор</a>
                                    </div>
                                </div>
                                <div class="col-4 text-end"><a href="#" class="link-light text-decoration-none">Понятно</a></div>
                            </div>

                        </div>
                    </div>`
        })
    })

    function DeleteUnsavedImages(){
        $('tbody tr').removeClass('active')
    }

</script>