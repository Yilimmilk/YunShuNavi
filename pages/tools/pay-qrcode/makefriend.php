<?php
$ua = $_SERVER['HTTP_USER_AGENT'];
if (strpos($ua, 'MicroMessenger')) {
    $type = 'wechat';
    $name = '微信';
    $friendqr_img = '<img src="img/friend_wechat.jpg" width=70%>';
}
elseif (strpos($ua, 'QQ/')) {
    $type = 'qq';
    $name = 'QQ';
    $friendqr_img = '<img src="img/friend_qq.jpg" width=70%>';
}
else {
    $type = 'other';
    $name = '不支持';
    $url = '';
    $friendqr_img = '';
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge, chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>加个好友咯？</title>
    <style type="text/css">
        * {margin: auto;padding: 0;border: 0;}
        html {-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%}
        body {font-family: -apple-system, SF UI Text, Arial, Microsoft YaHei, Hiragino Sans GB, WenQuanYi Micro Hei, sans-serif;color: #333;}
        h3 {padding: 10px;}
        .container {text-align: center;}
        .title {padding: 2em 0;background-color: #fff;}
        .content {padding: 2em 1em;color: #fff;}
        .wechat {background-color: #23ac38;}
        .qq {background-color: #4c97d5;}
        .other {background-color: #ff7055;}
    </style>
</head>
<body class="<?=$type?>">
    <div class="container">
        <div class="title"><?=$icon_img?><h1><?=$friendqr_img?></h1></div>
        <div class="content"><?=$type=='other'?'<h3>请使用支付宝、微信、QQ客户端扫码</h3>':'<h3>扫描或长按识别二维码来加我咯。</h3>'?></div>
    </div>
</body>
</html>