<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="/proj/css/bootstrap.min.css">
    <link rel="stylesheet" href="/proj/css/override.css">
    <link rel="stylesheet" href="/proj/css/style.css">

    <title></title>
</head>
<body>
    <?php include './main.php'; ?>

<div class="container">

    <code class="lead">
        <a href="/">Home</a> <br><br>

        <?php // if (empty($text)):?> 
            
            <div id="controls" class="btn-group" role="group">
                <button type="button" class="btn btn-secondary" id="recordButton">Начать запись</button>
                <button type="button" class="btn btn-secondary" id="pauseButton" disabled>Пауза</button>
                <button type="button" class="btn btn-secondary" id="stopButton" disabled>Стоп</button>
            </div>
            <ol id="recordingsList" class="d-none"></ol>
            <br><br>
        <?php //endif;?>

        <form id="form" method="post" enctype="multipart/form-data">
            <?php// if (empty($text)):?> 
            <input id="recording" type="hidden" name="recording">
            

            <input type="text" id="link" name="video" placeholder="ссылка на видео" style="width: 500px;">
            <select id="select_vid">
                <option value="" disabled selected>Выбрать с сервера</option>
                <option value="https://www.youtube.com/watch?v=NFBmlewLt8w">NFBmlewLt8w</option>
                <option value="https://www.youtube.com/watch?v=hU-1RuG9_l4">hU-1RuG9_l4</option>
                <option value="https://www.youtube.com/watch?v=_jfh5anXrS4">_jfh5anXrS4</option>
                <option value="https://www.youtube.com/watch?v=OmApr4hAm1A">OmApr4hAm1A</option>
                <option value="https://www.youtube.com/watch?v=7cT98SIlDiI">7cT98SIlDiI</option>
                <option value="https://www.youtube.com/watch?v=E8jX07xiKaQ">E8jX07xiKaQ</option>
                <option value="https://www.youtube.com/watch?v=lfgQZfhkQjA">lfgQZfhkQjA</option>
                <option value="https://www.youtube.com/watch?v=f0VsqmIWDlQ">f0VsqmIWDlQ</option>
            </select>
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="embed-responsive embed-responsive-16by9" style="display: none;">
                        <iframe class="embed-responsive-item" src="" controls="0" ></iframe>
                    </div>
                </div>
            </div>
            <br><br>
        
            <input type="file" id="videoFile" name="file"><br><br>
        <?php// endif;?>

            <h4>или введите свой текст:</h4>
            <div class="form-group bmd-form-group mt-3">
                <textarea class="form-control" name="text" rows="6"><?=!empty($textOriginal)?strip_tags($textOriginal):''?></textarea>
            </div>

            <button id="submit" class="btn btn-success" type="submit">Обработать</button>

        </form>
        
    </code>
<hr>
    <?php if (isset($result)):?>
        <div class="row no-gutters mt-3">
            <div class="col-6 bg-light p-3 text-dark">
                <?php if (!empty($text)):?> 
                    <h3 class="border-bottom">Text</h3>
                    <p class="small"><?= nl2br($text) ?></p>
                <?php endif;?>
                <?php if (!empty($preview)):?> 
                    <img src="/proj/<?=$preview?>" alt="" class="img-fluid w-100">
                <?php endif;?>
                <?php if (!empty($recording)):?> 
                    <h3 class="border-bottom">Audio</h3>
                    <figure>
                        <figcaption>Input</figcaption>
                        <audio src="/proj/in.wav" controls></audio>
                    </figure>
                    <figure>
                        <figcaption>Output</figcaption>
                        <audio src="/proj/out.wav" controls></audio>
                    </figure>
                <?php endif;?>
            </div>

            <div class="col-6 bg-dark p-3">
                <h3 class="border-bottom">JSON</h3>
                <pre class="small text-white"><?= json_encode($result, JSON_PRETTY_PRINT) ?></pre>
            </div>
        </div>
    <?php endif;?>
</div>

<script src="/proj/js/jquery-3.5.1.slim.min.js"></script>
<script src="/proj/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.rawgit.com/mattdiamond/Recorderjs/08e7abd9/dist/recorder.js"></script>
<script src="/proj/js/script.js"></script>     

<script>
// Вставка скрипта:
(function(w, d, s, p, a, c) {
w.sfButton = w.sfButton || function(){};
c = d.getElementsByTagName(s)[0];
a = d.createElement(s);
a.async=1;
a.src=p;
c.parentNode.insertBefore(a, c);
})(window, document, 'script', '/proj/sf-helper-agent.min.js');

// Текст:
sfButton.text = 'Скачать';

// Cтили:
sfButton.styles = {
 color: 'rgba(0,0,0,0.7)',
 textShadow: '1px 1px 1px rgba(255,255,255,0.4)',
 fontFamily: 'Arial,Helvetica,sans-serif',
 fontSize: '12px',
 borderRadius: '4px',
 backgroundColor: '#81c200',
 'background-image': '-webkit-linear-gradient(#9cd600, #69ae00)',
 'background-image': '-moz-linear-gradient(#9cd600, #69ae00)',
 'background-image': 'linear-gradient(#9cd600, #69ae00)',
 border: 'none'
};
</script>

</body>
</html>