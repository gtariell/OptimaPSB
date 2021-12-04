<?php


function get_content($url, $post = 0,$auth = false) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url ); // отправляем на
    // curl_setopt($ch, CURLOPT_HEADER, 0); // пустые заголовки
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // возвратить то что вернул сервер
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); // следовать за редиректами
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);// таймаут4
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,  2);
//    curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
//    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Host: portfolio.usue.ru'));
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);// просто отключаем проверку сертификата
    if ($auth)
        curl_setopt($ch, CURLOPT_COOKIEJAR,  ROOT.'/public/exporter/my_cookies.txt');
//        curl_setopt($ch, CURLOPT_COOKIEFILE,  ROOT.'/public/exporter/my_cookies.txt');
    curl_setopt($ch, CURLOPT_POST, $post !== 0);
    if ($post) {
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        curl_setopt($ch, CURLOPT_POSTREDIR, 3);

        curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
    }
    $data = curl_exec($ch);
//        curl_getinfo($ch);
    curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
    curl_close($ch);
    return $data;
}

function dd($arr){
    debug($arr, true);
}

function debug($arr, $die = false){
    echo '<pre>' . print_r($arr, true) . '</pre>';
    if($die) die;
}

function redirect($http = false){
    if($http){
        $redirect = $http;
    }else{
        $redirect = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '/';
    }
    header("Location: $redirect");
    exit;
}

function h($str){
    return htmlspecialchars($str, ENT_QUOTES);
}

function __($key){
    echo \fw\core\base\Lang::get($key);
}

function binToAscii($bin) {
    $text = array();
    $bin = str_split($bin, 8);

    for($i=0; count($bin)>$i; $i++)
        $text[] = chr(bindec($bin[$i]));

    return implode($text);
}

function readBin($file)
{
    $filesize = filesize($file);
    $fp = fopen($file, 'rb');
    $binary = fread($fp, $filesize);
    fclose($fp);

    return $binary;
}