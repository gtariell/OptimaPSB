<div class="row mt-5">
    <div class="col-12 col-md">
        <div class="plate">
            <div class="card shadow">
                <div class="card-body p-3">
                    <textarea class="form-control" name="" id="" placeholder="Введите текст, загрузите видео или запишите голосовую запись"></textarea>
                    <input id="recording" type="hidden" name="recording">
                    <div class="embed-responsive embed-responsive-16by9">
                        <video class="embed-responsive-item" controls id="video" style="display: none"></video>
                    </div>
                </div>
            </div>

            <div class="row mb-4 mt-4">
                <div class="col">
                    <div class="input-group input-overlay w-100">
                        <div class="custom-file">
                            <input id="file" type="file" class="custom-file-input">
                            <label class="custom-file-label text-md-center" for="file">ВЫБЕРИТЕ ФАЙЛ</label>
                        </div>
                    </div>
                </div>
                <div class="col-auto">
                    <a id="btn-rec" class="btn btn-dark shadow d-block" href="#" onclick="rec()"><img src="/cl/assets/mic.svg" alt=""></a>
                </div>
            </div>


            <div class="progress shadow" style="visibility: hidden">
                <div class="progress-bar" id="progressbar" style="width: 0" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-auto d-flex flex-column justify-content-center">
        <div class="input-overlay d-flex flex-column justify-content-md-between mb-5">
            <div class="input-group">
                <a href="#" id="clear-input" class="btn btn-dark btn-block">Сброс</a>
            </div>

            <div class="text-center mt-3">
                <a class="btn btn-dark btn-block" href="#" id="process">обработать</a>
            </div>

            <div class="input-group my-3">
                <select id="lang" class="nice-select w-100">
                    <option value="ru-Ru" selected>RUS</option>
                    <option value="en-US">ENG</option>
                </select>
            </div>
        </div>
    </div>

    <div class="col-12 col-md d-flex align-items-center flex-column">
        <div class="plate mb-4">
            <div class="card shadow">
                <div class="card-body p-3">
                    <div style="overflow-y: auto;max-height: 480px; padding-right: 15px; color: #666666">
                        <div id="accordion">
                            <a class="d-block text-white lead text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                TAGS
                            </a>
                            <div id="collapseOne" class="collapse show" data-parent="#accordion">
                                <p id="tags"></p>
                            </div>

                            <a class="d-block text-white lead text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                JSON
                            </a>
                            <div id="collapseTwo" class="collapse" data-parent="#accordion">
                                <pre id="json"></pre>
                            </div>

                            <a class="d-block text-white lead text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                TEXT
                            </a>
                            <div id="collapseThree" class="collapse" data-parent="#accordion">
                                <p id="text"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>