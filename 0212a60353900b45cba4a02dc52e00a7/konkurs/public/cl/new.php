<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

// declare(strict_types=1);
require __DIR__ . '/vendor/autoload.php';
require  __DIR__ . '/functions.php';

if (empty($_POST)) return;

$videoFile = $video = $recording = $text = $preview = null;
if (!empty($_POST['text'])) {$text = $_POST['text'];}
if (!empty($_POST['recording'])) {$recording = $_POST['recording'];}
if (!empty($_FILES['file'])) {$videoFile = $_FILES['file'];}
if (!empty($_POST['video'])) {$video = $_POST['video'];}

$ffmpeg = FFMpeg\FFMpeg::create();

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

if (false && !empty($video)) {
    require_once "class.youtube.php";
    $yt  = new YouTubeDownloader();
    $downloadLinks ='';
    $error='';
    $videoLink = $video;
    if(!empty($videoLink)) {
        $vid = $yt->getYouTubeCode($videoLink);
        if($vid) {
            $result = $yt->processVideo($vid);
            // dd($result);
            if($result) {
                $info = $result['videos']['info'];
                $formats = $result['videos']['formats'];
                $adapativeFormats = $result['videos']['adapativeFormats'];
                $videoInfo = json_decode($info['player_response']);
                $title = $videoInfo->videoDetails->title;
                $thumbnail = $videoInfo->videoDetails->thumbnail->thumbnails[0]->url;
            } else {
                $error = "Something went wrong";
            }
        }
    } else {
        $error = "Please enter a YouTube video URL";
    }
}

if (!empty($recording)) {
    if (empty($videoFile)) {
        $audio = $ffmpeg->open( "./in.wav" );
        $audio_format = new FFMpeg\Format\Audio\Wav();
        $audio_format->setAudioChannels(1)->setAudioKiloBitrate(16);
        $audio->save($audio_format, 'in.wav');
    }

    $res = get_content('http://127.0.0.1:5000/model', json_encode([
        'speech_in_encoded' => [base64_encode(file_get_contents("./in.wav"))],
    ]));
    try {
        $result = json_decode($res,1)[0];
        $textOriginal = $text = $result[0];
        $fp = fopen('out.wav', 'wb');
        fwrite($fp, base64_decode($result[1]));
        fclose($fp);
    } catch (\Exception $e) {
        // return;
    }
}

if (!empty($text) && empty($recording)) {
    $skills = file_get_contents("./linkedin_skill.txt", true);
    $skills = explode("\n", $skills);

    $res = get_content('http://127.0.0.1:5005/model', json_encode(['x' => [$text]]));
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


    $textOriginal = $text;
    foreach ($skills as $k=>$item) {
        if (mb_strlen($item) < 4) continue;
        $text = preg_replace('#\b('. preg_quote($item) .')\b#i','<span class="tag SKILL">$1</span>',$text);
        // $text = str_replace(" $item ",' <span class="tag SKILL">'.$item.'</span> ', $text);
    }

    foreach ($tags as $k=>$item) {
        if (mb_strlen($res[$k]) < 4) continue;
        $text = preg_replace('#\b('. preg_quote($res[$k]) .')\b#i','<span title="'.$item.'" class="tag '.$item.'">$1</span>',$text);
        // $text = str_replace(' '.$res[$k].' ',' <span title="'.$item.'" class="tag '.$item.'">'.$res[$k].'</span> ', $text);
    }

    $result = [$res, $tags];
} else {
    unset($result);
}