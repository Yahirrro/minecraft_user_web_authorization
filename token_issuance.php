<?php
// 文字コード設定
header('Content-Type: text/html; charset=UTF-8');
ini_set('display_errors', "On");

include 'encryption_key.php';
if(! empty($_GET['uuid'])){
    $uuid = $_GET['uuid'];
} else {
    $uuid = '';
}
if(! empty($_GET['username'])){
    $username = $_GET['username'];
    $json = file_get_contents('https://api.mojang.com/users/profiles/minecraft/' . $username);
    $json = mb_convert_encoding($json, 'UTF-8', 'ASCII, JIS, UTF-8, eucJP-win, SJIS-win');
    $obj = json_decode($json);
    if (!empty($obj)) {
        $uuid = $obj->id;
    }
} else {
    $username = '';
}
if(! empty($_GET['json'])){
    $json = $_GET['json'];
} else {
    $json = '';
}
if(! empty($_GET['token'])){
    $gtoken = $_GET['token'];
} else {
    $gtoken = '';
}


if($json === 'true') {
    if($gtoken === $encrypt['token']) {
        $arr['uuid_token'] = bin2hex(openssl_encrypt($uuid, 'AES-128-ECB', $encrypt['key']));

        $mysqli = new mysqli( $mysql['host'], $mysql['username'], $mysql['password'], 'perms');
        if( $mysqli->connect_errno ) {
            echo $mysqli->connect_errno . ' : ' . $mysqli->connect_error;
        }
        $mysqli->set_charset('utf8mb4');
        $sql = 'SELECT * FROM `luckperms_players` WHERE `uuid` = \''.$uuid.'\' ORDER BY `primary_group`;';

        $res = $mysqli->query($sql);
        if( $res ) {
            foreach ($res as $key) {
                $arr['username'] = $key['username'];
                $arr['primary_group'] = $key['primary_group'];
            }
        }
        print json_encode($arr, JSON_PRETTY_PRINT);
    }
    else {
        echo 'tokenが正しくありません';
    }
}
else {
    if($gtoken === $encrypt['token']) {
        if ($uuid || $username) {
            echo bin2hex(openssl_encrypt($uuid, 'AES-128-ECB', $encrypt['key']));
        }
        else {
            echo 'Usernameが指定されていません';
        }
    }
    else {
        echo 'tokenが正しくありません';
    }
}