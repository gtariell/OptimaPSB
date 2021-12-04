<div class="row mb-4">
    <div class="col-4">
        <img src="/images/profile/perc-profile.png" alt="" width="100%">
    </div>
    <div class="col-8">
        <h4 class="mb-4"><span class="text-muted">Поговорим о тебе</span> Rssllrrk89
            <img id="play" src="/images/profile/play.svg" alt="" class="float-end d-block" style="cursor: pointer">
        </h4>


        <h4>Designer UI/UX Senior</h4>
        <div class="tags">
            <span class="tag">sketch</span>
            <span class="tag">figma</span>
            <span class="tag">charts</span>
            <span class="tag">zeplin</span>
            <span class="tag red">Adobe XD</span>
            <span class="tag red">After Effects</span>
            <span class="tag red">Photoshop</span>
            <span class="tag">dataflow</span>
        </div>

        <img src="/images/profile/skill.svg" alt="" width="100%">
        <br>
        <img src="/images/profile/active-task.svg" alt="" width="100%">
    </div>
</div>

<img src="/images/profile/graph.svg" alt="" width="100%">
<br>
<img src="/images/profile/digital.svg" alt="" width="100%">

<style>
    .tags {
        text-align: center;
    }
    .tag {
        background: #2C2D84;
        box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.25);
        border-radius: 4px;
        padding: 3px 70px;
        text-align: center;
        margin-right: 3px;
        margin-bottom: 4px;
        white-space: nowrap;
        display: inline-block;
    }
    .red {
        background: #E95616;
        box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.25);
        border-radius: 4px;
    }
</style>

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
    $('body').on('click','#play', function () {
        Swal.fire({
            padding: '0',
            showConfirmButton: false,
            width: 965,
            background: 'rgba(0,0,0,.9) url(/images/tmp/modal.svg) no-repeat center center / cover',
            html: `<div style="width: 925px; height: 466px; padding: 20px;" class="row">
                        <div class="col-4" style="position:relative;">
                            <h3 class="mb-3">Пора узнать тебя поближе!</h3>
                            <p>Запиши или загрузи видеовизитку о себе, со своими навыками, связанными с проектом. Это могут быть soft и hard skills.</p>
                            <img src="/images/tmp/perc-modal.png" alt="" width="90%" style="position: absolute;bottom: -17px;">
                        </div>
                        <div class="col-8">
                            <img src="/images/profile/video.svg" alt="" width="100%" style="cursor: pointer">
                            <div class="row align-items-center mt-3">
                                <div class="col-8">
                                    <div class="d-grid gap-2">
                                        <a href="#" class="btn btn-primary btn-shadow">Отправить видеовизитку</a>
                                    </div>
                                </div>
                                <div class="col-4 text-end"><a href="#" class="link-light text-decoration-none">Загрузить</a></div>
                            </div>

                        </div>
                    </div>`
        })
    })
</script>