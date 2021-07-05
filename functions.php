<?php
function init() {

}

function randomToken($strLength): string
{
    $str = 'qwertyuiopasdfghjklzxcvbnm';
    $str .= 'QWERTYUIOPASDFGHJKLZXCVBNM';
    $str .= '1234567890';
    $token = '';
    for ($it = 0; $it < $strLength; $it++) try {
        $token .= $str[random_int(0, strlen($str) - 1)];
    } catch (Exception $e) {}
    return $token;
}

function redirect($ua, $payment, $scheme) {
    /*
     *
     */
    if (strpos($ua, 'AlipayClient/') && $payment !== 'alipay')
        header("Location: ".$scheme.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']."?payment=alipay&#alipay");
        
    if (strpos($ua, 'MicroMessenger') && $payment !== 'wechat')
        header("Location: ".$scheme.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']."?payment=wechat&#wechat");
        
    if (strpos($ua, 'QQ/') && $payment !== 'wechat')
        header("Location: ".$scheme.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']."?payment=qqpay&#qqpay");
}

function morePayment($MORE_PAYMENT): int
{
    foreach ($MORE_PAYMENT as $payment => $url) {
        if ($url !== '') return 1;
    }
    return 0;
}

function printMorePayment($MORE_PAYMENT): int
{
    echo '<div class="mdui-container mdui-typo center">';
    foreach ($MORE_PAYMENT as $payment => $url) {
        if ($url !== '') {
            echo "<br><div class=\"mdui-typo-title\"><p>使用 ".$payment."<br>向 ".NAME." 付款</p></div><br>";
            echo "<img src=\"".QRCODE_API_URL.urlencode($url)."\" width=\"300\" height=\"300\" alt=\"\"><br><br><hr/>";
        }
    }
    echo '</div>';
    return 0;
}

$avatar = AVATAR_URL ?: "https://secure.gravatar.com/avatar/";
if (TLS_ENCRYPT == 'auto' || TLS_ENCRYPT == '') {
    $scheme = ( isset($_SERVER['HTTPS'])
                            && $_SERVER['HTTPS'] == 'on' 
                            || (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) 
                            && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https')
                            )? 'https://' : 'http://';
} else if (TLS_ENCRYPT == 'disable') {
    $scheme = 'http://';
} else if (TLS_ENCRYPT == 'enable') {
    $scheme = 'https://';
}