<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

// declare(strict_types=1);
require __DIR__ . '/vendor/autoload.php';
require  __DIR__ . '/functions.php';

//echo <<<EOT
//{"tags":{"tnl":"B-QUANTITY","five":"I-QUANTITY","s":"I-QUANTITY","spring":"B-DATE","two":"B-CARDINAL","hundred":"I-CARDINAL","plus":"I-CARDINAL"},"text":"i 'm julia<\/span> i am a fals stack developer with higher it people i implement it cinmess functionality<\/span> for a product reviews<\/span><\/span> listicals can filteres and advanced<\/span> product filters<\/span> i developed a mobile<\/span> weg client to consume the api using an angular<\/span> jagas h tnl five<\/span> s as coordinated<\/span> hor server prottage development in spring<\/span><\/span> and b c and spring<\/span><\/span> sa a service components<\/span> for depoyment to two hundred<\/span> plus<\/span><\/span> client sites to hire someone like me please visit<\/span> i said w w w dot hier it people dot come or cauliset eight hundred<\/span> six niney three eight nine three nine"}
//EOT;
//dd($_FILES);
//die;
if (empty($_POST)) return;

$videoFile = $video = $recording = $text = $preview = $rec = $tags = $json = null;
if (!empty($_POST['text'])) {$text = $_POST['text'];}
if (!empty($_POST['recording'])) {$recording = $_POST['recording'];}

if (!empty($_FILES['file'])) {$videoFile = $_FILES['file'];}
if (!empty($_POST['video'])) {$video = $_POST['video'];}

//$text = "i 'm julia i am a fals stack developer with higher it people i implement it cinmess functionality for a product reviews listicals can filteres and advanced product filters i developed a mobile weg client to consume the api using an angular jagas h tnl five s as coordinated hor server prottage development in spring and b c and spring sa a service components for depoyment to two hundred plus client sites to hire someone like me please visit i said w w w dot hier it people dot come or cauliset eight hundred six niney three eight nine three nine";

$ffmpeg = FFMpeg\FFMpeg::create([
    'ffmpeg.binaries'  => '/usr/bin/ffmpeg',
    'ffprobe.binaries' => '/usr/bin/ffprobe'
]);

if (!empty($videoFile) && !empty($videoFile['tmp_name'])) {
    if(file_exists('./in.wav')) unlink('./in.wav');
    if(file_exists('./frame.jpg')) unlink('./frame.jpg');
    $video = $ffmpeg->open( $videoFile['tmp_name'] );
    $audio_format = new FFMpeg\Format\Audio\Wav();
    $audio_format->setAudioChannels(1)->setAudioKiloBitrate(16);
    $video->save($audio_format, 'in.wav');
    $recording = 1;
    $video->frame(FFMpeg\Coordinate\TimeCode::fromSeconds(10))->save('frame.jpg');
    $preview = 'frame.jpg';
}

if (!empty($recording)) {
//    if (!empty($videoFile)) {
//        $audio = $ffmpeg->open( "./in.wav" );
//        $audio_format = new FFMpeg\Format\Audio\Wav();
//        $audio_format->setAudioChannels(1)->setAudioKiloBitrate(16);
//        $audio->save($audio_format, 'in.wav');
//        dd('1213');
//    }

    $res = get_content('http://alpo.pro:5000/model', json_encode([
        'speech_in_encoded' => [base64_encode(file_get_contents("./in.wav"))],
    ]));

    try {
        $result = json_decode($res,1)[0];
        $textOriginal = $text = $result[0];
        $fp = fopen('out.wav', 'wb');
        fwrite($fp, base64_decode($result[1]));
        fclose($fp);
        $rec = $result;
    } catch (\Exception $e) {
        // return;
    }
}

if (!empty($text) /*&& empty($recording)*/) {
    $skills = file_get_contents("./linkedin_skill.txt", true);
    $skills = explode("\n", $skills);

    $res = get_content('http://alpo.pro:5005/model', json_encode(['x' => [$text]]));
    $result = json_decode($res,1)[0];
    $res = $result[0];
    $tags = [];
    foreach ($res as $k=>$item) {
        $tag = $result[1][$k];
        if (in_array($tag,['O',''])) {
            unset ($res[$k]);
            continue;
        }
        $tags[] = $tag;
    }
    $res = array_values($res);


    $add_tags = $add_res = [];
    $tags_str = [];

    $textOriginal = $text;
    foreach ($skills as $k=>$item) {
        if (mb_strlen($item) < 4) continue;
        preg_match('#\b(' . preg_quote($item) . ')\b#i', $text, $matches);
        if (!empty($matches[1])) {
            $add_tags[] = $item; $add_res[] = 'O-SKILL';
            $tags_str[] = '<span title="O-SKILL" class="tag SKILL">'.$item.'</span>';
        }
        $text = preg_replace('#\b('. preg_quote($item) .')\b#i','<span class="tag SKILL">$1</span>',$text);
        // $text = str_replace(" $item ",' <span class="tag SKILL">'.$item.'</span> ', $text);
    }

    foreach ($tags as $k=>$item) {
        if (mb_strlen($res[$k]) < 4) continue;
        $text = preg_replace('#\b('. preg_quote($res[$k]) .')\b#i','<span title="'.$item.'" class="tag '.$item.'">$1</span>',$text);
        $tags_str[] = '<span title="'.$item.'" class="tag '.$item.'">'.$res[$k].'</span>';
        // $text = str_replace(' '.$res[$k].' ',' <span title="'.$item.'" class="tag '.$item.'">'.$res[$k].'</span> ', $text);
    }
    $tags_str = implode(' ', $tags_str);

//    $tags = $result = array_combine($res, $tags);
    $tags = array_merge($tags, $add_tags);
    $res = array_merge($res, $add_res);
    $tags = $result = [$res, $tags];
//    $text = $tags_str;
    $json = $tags;
    $tags = $tags_str;
} else {
    unset($result);
}

echo json_encode(compact('tags','json','text', 'rec', 'add_tags'));