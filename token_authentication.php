<?php
// 文字コード設定
header('Content-Type: text/html; charset=UTF-8');
ini_set('display_errors', "On");

include 'encryption_key.php';

if(! empty($_GET['uuid_token'])){
    $uuid_token = hex2bin($_GET['uuid_token']);
} else {
    $uuid_token = '';
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
        $arr['uuid'] = openssl_decrypt($uuid_token, 'AES-128-ECB', $encrypt['key']);

        $mysqli = new mysqli( $mysql['host'], $mysql['username'], $mysql['password'], 'perms');
        if( $mysqli->connect_errno ) {
            echo $mysqli->connect_errno . ' : ' . $mysqli->connect_error;
        }
        $mysqli->set_charset('utf8mb4');
        $sql = 'SELECT * FROM `luckperms_players` WHERE `uuid` = \''.$arr['uuid'].'\' ORDER BY `primary_group`;';

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
        if (! empty($uuid_token)) {
            echo openssl_decrypt($uuid_token, 'AES-128-ECB', $encrypt['key']);
        }
        else {
            echo 'UUID_TOKENが指定されていません';
        }
    }
    else {
        echo 'tokenが正しくありません';
    }
}