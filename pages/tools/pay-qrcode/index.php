<?php
$ua = $_SERVER['HTTP_USER_AGENT'];
if (strpos($ua, 'MicroMessenger')) {
    $type = 'wepay';
    $name = '微信支付';
    //微信支付链接
    $url = 'wxp://f2f0nWvKtMtrT5mxXv93yDVltFfJc4pXhtjs';
    $payqr_img = '<img src="img/wechatpay.jpg" width=70%>';
    $makefriend = '<a href="makefriend.php" target="class"><button class="button button_3d" data-button="red">或者，你想加我好友？</button></a>';
}
elseif (strpos($ua, 'AlipayClient')) {
    //支付宝链接
    $url = 'https://qr.alipay.com/fkx15435tog1vsekxlpcz45';
    header('location: ' . $url);
}
elseif (strpos($ua, 'QQ/')) {
    $type = 'qq';
    $name = 'QQ钱包支付';
    //QQ钱包支付链接
    $url = 'https://i.qianbao.qq.com/wallet/sqrcode.htm?m=tenpay&a=1&u=2510355993&ac=CAEQmfyDrQkYmse99wU%3D_xxx_sign&n=%E8%B1%8C%E8%B1%86&f=wallet';
    $payqr_img = '<img src="img/qqpay.jpg" width=70%>';
    $makefriend = '<a href="https://qm.qq.com/cgi-bin/qm/qr?k=dMuECoa8athuT2u_aKaCr6WIgsyMXC8V&noverify=0" target="class"><button class="button button_3d" data-button="red">或者，你想加我好友？</button></a>';
}
else {
    $type = 'other';
    $name = '不支持的付款方式';
    $url = '';
    $payqr_img = '';
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge, chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$name?></title>
    <style type="text/css">
        * {margin: auto;padding: 0;border: 0;}
        html {-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%}
        body {font-family: -apple-system, SF UI Text, Arial, Microsoft YaHei, Hiragino Sans GB, WenQuanYi Micro Hei, sans-serif;color: #333;}
        h3 {padding: 10px;}
        .button_3d {
        	padding: 1em 1.3em .9em;
        	border: 0;
        	box-shadow: inset 0 -7px 0 rgba(0, 0, 0, 0.15);
        	font-size: 1.2em;
        	border-radius: 6px;
        	color: #e6e6e6;
        	background: #b4b4b4;
        	transition: all 0.1s;
        }
        .button_3d[data-button=red]{
        	background: #EF5350;
        }
        .container {text-align: center;}
        .title {padding: 2em 0;background-color: #fff;}
        .content {padding: 2em 1em;color: #fff;}
        .wepay {background-color: #23ac38;}
        .qq {background-color: #4c97d5;}
        .other {background-color: #ff7055;}
    </style>
</head>
<body class="<?=$type?>">
    <div class="container">
        <div class="title"><?=$icon_img?><h1><?=$name?></h1></div>
        <div class="content"><?=$type=='other'?$payqr_img.'<h3>请使用支付宝、微信、QQ客户端扫码付款</h3>':$payqr_img.'<h3>扫描或长按识别二维码，向TA付款</h3>'?></div>
        <?=$makefriend?>
    </div>
</body>
</html>