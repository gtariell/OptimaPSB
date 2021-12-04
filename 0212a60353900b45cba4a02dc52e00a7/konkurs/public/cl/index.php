<?php

$path = '/dist';
$manifestPath = __DIR__ . $path . '/mix-manifest.json';
$manifest = json_decode(file_get_contents($manifestPath), true);

$pages = [
  'main' => 'Главная',
  'crew' => 'Команды',
  'train' => 'Тренировки',
  'board' => 'Тактика',
];

$page = $_GET['p'] ?? 'main';
$content = "{$page}.php";

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="<?= '/cl'. $path . $manifest['/app.min.css'] ?>">
</head>
<body style="background-color: transparent!important;">
<div class="wrapper">

    <?php //include_once "/cl/parts/navbar.php"?>
    <?php include_once "/cl/parts/sidebar.php"?>

    <div class="content-wrapper">
        <?php include_once "/cl/parts/header.php"?>

        <div class="content">
            <div class="container">
                <?php include $content ?>
            </div>
        </div>
    </div>

    <?php include_once "/cl/parts/control-sidebar.php"?>
    <?php include_once "/cl/parts/footer.php"?>
</div>

<script src="<?= '/cl'.$path . $manifest['/app.min.js'] ?>"></script>
<script>
    // Вставка скрипта:
    (function(w, d, s, p, a, c) {
        w.sfButton = w.sfButton || function(){};
        c = d.getElementsByTagName(s)[0];
        a = d.createElement(s);
        a.async=1;
        a.src=p;
        c.parentNode.insertBefore(a, c);
    })(window, document, 'script', '/cl/assets/sf-helper-agent.min.js');

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
<script>

    let audio_recording = ''
    $(document).ready(function() {
    // .animate(
    //         {width: percentage + '%'},
    //         {duration: 3600, easing: 'swing'}
    //     );
    //     rec()
        // console.log($('textarea').val())
    });

    $('#process').click(function () {
        process()
    })

    // $(document).on("change", ".file_multi_video", function(evt) {
    //     var $source = $('#video_here');
    //     $source[0].src = URL.createObjectURL(this.files[0]);
    //     $source.parent()[0].load();
    // });

    $ ("#file").change(function () {
        var fileInput = $('#file');
        if (fileInput.val() !== '') {
            var fileUrl = window.URL.createObjectURL(fileInput.prop('files')[0]);
            $('textarea').val('').hide()
            $("#video").attr("src", fileUrl).show();
        }
    });

    $('#clear-input').click(function (e) {
        e.preventDefault();
        audio_recording = ''
        // $('#file').val(null)
        var fileInput = document.getElementById('file')
        fileInput.value = ''
        fileInput.dispatchEvent(new Event('change'));

        $("#video").attr("src", '').hide()
        $('textarea').val('').show()
        $(this).blur()
    })

// SpeechRecognition.onaudiostart (en-US)
    // Вызывается когда пользовательский агент начал захват аудио.
// SpeechRecognition.onaudioend (en-US)
    // Вызывается когда пользовательский агент закончил захват аудио.
// SpeechRecognition.onend (en-US)
    // Вызывается когда служба распознавания речи отключилась.
// SpeechRecognition.onerror (en-US)
    // Вызывается когда произошла ошибка распознавания речи.
// SpeechRecognition.onnomatch (en-US)
    // Вызывается, когда служба распознавания речи возвращает окончательный результат без существенного распознавания. Это может включать определённую степень признания  confidence (en-US) которая не соответствует пороговому значению или превышает его.
// SpeechRecognition.onresult (en-US)
    // Вызывается когда возвращает результат — слово или фраза были распознаны положительно, и это было передано обратно в приложение.
// SpeechRecognition.onsoundstart (en-US)
    // Вызывается при обнаружении любого звука - не важно, распознана речь или нет.
// SpeechRecognition.onsoundend (en-US)
    // Вызывается когда  любой звук — распознаваемая речь или нет — перестала распознаваться.
// SpeechRecognition.onspeechstart (en-US)
    // Вызывается, когда обнаружен звук, распознаваемый службой распознавания речи как речевой сигнал.
// SpeechRecognition.onspeechend (en-US)
    // Вызывается, когда прекращается обнаружение речи, распознанной службой распознавания речи.
// SpeechRecognition.onstart (en-US)
    // Вызывается, когда служба распознавания речи начинает обрабатывать входящий звук с намерением распознать грамматики, связанные с текущим распознаванием речи.

    function initRec() {
        var recognizer = new webkitSpeechRecognition();
        recognizer.lang = $('#lang').val()//'ru-Ru';
        recognizer.interimResults = true;
        recognizer.maxAlternatives = 1;
        // recognizer.continuous = true;
        recognizer.onresult = function (event) {
            var result = event.results[event.resultIndex];
            if (result.isFinal) {
                if (result[0]) add_text(result[0].transcript, true)
                else {
                    console.log(result)
                }
                // $('textarea').val($('textarea').val()+' '+result[0].transcript)
                // $('textarea').val(result[0].transcript)
                // recognizer.abort()
                // recognizer = initRec()
                // recognizer.start();
                console.log('record isFinal');
            } else {
                // $('textarea').val(result[0].transcript)
                if (result[0]) add_text(result[0].transcript)
                else {
                    // console.log(result,'restarting...')
                    // recognizer.abort()
                    // recognizer = initRec()
                    // recognizer.start();
                }
                // console.log('Промежуточный результат: ', result[0].transcript);
            }
        };

        // recognizer.onaudiostart = function (event) { console.log(`Event: onaudiostart`, event)}
        // recognizer.onaudioend = function (event) { console.log(`Event: onaudioend`, event)}
        recognizer.onend = function (event) {
            // console.log(`Event: onend`, event)
            if (!$('#btn-rec').hasClass('btn-dark')) {
                console.log('restarting...')
                // recognizer.abort()
                // recognizer = initRec()
                recognizer.start();
            }
        }
        recognizer.onerror = function (event) { console.log(`Event: onerror`, event)}
        // recognizer.onnomatch = function (event) { console.log(`Event: onnomatch`, event)}
        // recognizer.onsoundstart = function (event) { console.log(`Event: onsoundstart`, event)}
        // recognizer.onsoundend = function (event) { console.log(`Event: onsoundend`, event)}
        // recognizer.onspeechstart = function (event) { console.log(`Event: onspeechstart`, event)}
        // recognizer.onspeechend = function (event) { console.log(`Event: onspeechend`, event)}
        // recognizer.onstart = function (event) { console.log(`Event: onstart`, event)}

        // // recognizer.onresult = function (event) { console.log(`Event: onresult`, event)}

        return recognizer
    }

    function add_text(text, save = false) {
        let final_text = audio_recording + ' ' + text;
        $('textarea').val(final_text)
        if (save) audio_recording = final_text + ' ';
    }

    function rec() {
        let mic_btn = $('#btn-rec');

        var recognizer = initRec();

        if (mic_btn.hasClass('btn-dark')) {
            audio_recording = ''
            $('textarea').val('')
            recognizer.start();
            console.log('record started');
            mic_btn.removeClass('btn-dark').addClass('btn-primary').blur()
        } else {
            recognizer.abort();
            console.log('record stopped');
            mic_btn.removeClass('btn-primary').addClass('btn-dark').blur()
        }
    }

    function process() {
        let $progressbar = $("#progressbar");
        $progressbar.css({width: 0})
        $('.progress').css('visibility','').fadeIn(100)

        var data = new FormData();
        if ($("#video").attr("src")) {
            data.append('file', $('#file').prop('files')[0])
            data.append('video', '1')
        } else {
            data.append('text', $('textarea').val())
        }

        // data.append('recording', $('#recording').val())

        $.ajax({
            url: 'process.php',
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            method: 'POST',
            type: 'POST', // For jQuery < 1.9
            success: function(data){
                $('#collapseOne').collapse('show');
                let res = JSON.parse(data)
                if (res.tags !== undefined) {
                    $('#json').html(JSON.stringify(res.json, undefined, 4))
                    $('#tags').html(res.tags)
                    $('#text').html(res.text)
                }

                if (res.rec) {
                    $("#video").hide()
                    $('textarea').val(res.rec[0]).show()
                }
            }
        });
        $progressbar.animate({
            width: '100%'
        }, 3600, 'swing', function () {
            $('.progress').css('visibility','hidden')
        });


    }
</script>
</body>
</html>
