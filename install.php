<?php
if (!file_exists('config.php')) {
    $name = (isset($_REQUEST['name']) && strlen($_REQUEST['name']) > 0) ? $_REQUEST['name'] : '';
    $alipay = (isset($_REQUEST['alipay']) && filter_var($_REQUEST['alipay'], FILTER_VALIDATE_URL)) ? $_REQUEST['alipay'] : '';
    $wechat = (isset($_REQUEST['wechat']) && filter_var($_REQUEST['wechat'], FILTER_VALIDATE_URL)) ? $_REQUEST['wechat'] : '';
    $qq = (isset($_REQUEST['qqpay']) && filter_var($_REQUEST['qqpay'], FILTER_VALIDATE_URL)) ? $_REQUEST['qqpay'] : '';
    $avatar = (isset($_REQUEST['avatar_url']) && filter_var($_REQUEST['avatar_url'], FILTER_VALIDATE_URL)) ? $_REQUEST['avatar_url'] : 'https://secure.gravatar.com/avatar/';
    $theme_primary = (isset($_REQUEST['theme-primary']) && strlen($_REQUEST['theme-primary']) > 2) ? $_REQUEST['theme-primary'] : '';
    $theme_accent = (isset($_REQUEST['theme-accent']) && strlen($_REQUEST['theme-accent']) > 2) ? $_REQUEST['theme-accent'] : '';
    if ($name && $theme_primary && $theme_accent) { // submit
        $config_file[0] = '<?php';
        $config_file[1] = '';
        $config_file[2] = 'const NAME = \'' . $name . '\';';
        $config_file[3] = 'const ALIPAY_URL = \'' . $alipay . '\';';
        $config_file[4] = 'const WECHAT_URL = \'' . $wechat . '\';';
        $config_file[5] = 'const QQPAY_URL = \'' . $qq . '\';';
        $config_file[6] = '';
        $config_file[7] = '// Add more payment :';
        $config_file[8] = '// usage : $MORE_PAYMENT[\'___YOUR___PAYMENT___HERE___\'] = \'___PAYMENT___URL___HERE___\';(支持中文)';
        $config_file[9] = '$MORE_PAYMENT[\'examplePayment\'] = \'\'; // DO NOT delete or change';
        $config_file[10] = '// NOTE : DO NOT delete or change the examplePayment, otherwise it may cause errors.';
        $config_file[11] = '';
        $config_file[12] = 'const AVATAR_URL = \'' . $avatar . '\';';
        $config_file[13] = '// Optional theme color :';
        $config_file[14] = '// amber blue blue-grey brown cyan deep-orange deep-purple green grey indigo';
        $config_file[15] = '// light-blue light-green lime orange pink purple red teal yellow';
        $config_file[16] = 'const PRIMARY_THEME = \'' . $theme_primary . '\';';
        $config_file[17] = 'const ACCENT_THEME = \'' . $theme_accent . '\';';
        $config_file[18] = '// enable  : Forced to use https, use with caution in pure http environment.';
        $config_file[19] = '// disable : Forced to use http, use with caution if HSTS is enabled on the website.';
        $config_file[20] = '// auto    : Automatically identify whether https is available.';
        $config_file[21] = 'const TLS_ENCRYPT = \'auto\';';
        $config_file[22] = 'const QRCODE_API_URL = \'https://api.qrserver.com/v1/create-qr-code/?size=300x300&data=\';';
        $config_file[23] = '';
        $config_file[24] = 'const MULTI_QR_PAY_VERSION = \'1.1\';';
        $config_file[25] = 'error_reporting(E_ALL);';
        $config_file[26] = '$_ERROR = array();';
        $logfile = fopen("config.php", "a+");
        foreach ($config_file as $line => $string) {
            fwrite($logfile, "$string\n");
        }
        fclose($logfile);
        $scheme = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on' || (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https')) ? 'https://' : 'http://';
        header("Location: ".$scheme.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
        exit();
    }
} else {
    $scheme = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on' || (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https')) ? 'https://' : 'http://';
    echo '已安装。如需重新安装，请删除当前目录下的 config.php (建议先备份) 后重新访问本页面.<br>multi_qr_pay<br><a href="'.$scheme.$_SERVER['HTTP_HOST'].str_replace('/install.php', '/index.php', $_SERVER['PHP_SELF']).'">返回主页</a>';
    exit();
}
?>
<!doctype html>
<html lang="zh-cmn-Hans">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="keywords" content="multi_qr_pay"/>
    <link rel="shortcut icon" href="https://fifcom.cn/avatar/?transparent=1"/>
    <style>.center {text-align: center}</style>
    <style>.center {
            text-align: center
        }</style>
    <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/mdui@1.0.1/dist/css/mdui.min.css"
            integrity="sha384-cLRrMq39HOZdvE0j6yBojO4+1PrHfB7a9l5qLcmRm/fiWXYY+CndJPmyu5FV/9Tw"
            crossorigin="anonymous"
    />
    <title>multi_qr_pay - 安装</title>
</head>
<body class="mdui-appbar-with-toolbar mdui-theme-primary-teal mdui-theme-accent-indigo mdui-theme-layout-auto mdui-loaded">
<header class="mdui-appbar mdui-appbar-fixed">
    <div class="mdui-toolbar mdui-color-theme">
        <a href="./" class="mdui-typo-headline">multi_qr_pay - 安装</a>
    </div>
</header>

<div class="mdui-container doc-container">
    <div class="mdui-card" style="margin-top: 15px;border-radius:10px">
        <div class="mdui-card-primary mdui-typo">
            <div class="mdui-typo-display-1">欢迎！</div>
            <div class="mdui-typo-body-2">安装需求(不满足要求也可以安装)：</div>
            <div class="mdui-table-fluid">
                <table class="mdui-table">
                    <thead>
                    <tr>
                        <th>项目</th>
                        <th>建议</th>
                        <th>当前</th>
                        <th>满足条件</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>PHP 版本</td>
                        <td> >= 7.3</td>
                        <td><?= PHP_VERSION . "(" . PHP_VERSION_ID . ")" ?></td>
                        <td><?php echo PHP_VERSION_ID >= 70300 ? "true" : "false" ?></td>
                    </tr>
                    <tr>
                        <td>SSL</td>
                        <td>https</td>
                        <td><?php echo (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on' || (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https')) ? 'https' : 'http'; ?></td>
                        <td><?php echo (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on' || (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https')) ? 'true' : 'false'; ?></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="mdui-card" style="margin-top: 15px;border-radius:10px">
        <div class="mdui-card-primary mdui-typo">
            <div class="mdui-typo-display-1">安装</div>
            <div class="mdui-typo-body-2">仅需填写下方表单即可完成安装</div>
            <form action="#" method="post">
                <div class="mdui-textfield mdui-textfield-floating-label">
                    <i class="mdui-icon material-icons">account_circle</i>
                    <label class="mdui-textfield-label">姓名 / 昵称</label>
                    <input class="mdui-textfield-input" name="name" type="text" required/>
                    <div class="mdui-textfield-error">*必填，不能为空</div>
                </div>
                <div class="mdui-textfield mdui-textfield-floating-label">
                    <i class="mdui-icon material-icons">monetization_on</i>
                    <label class="mdui-textfield-label">支付宝收款链接</label>
                    <input class="mdui-textfield-input" name="alipay" type="text"/>
                    <div class="mdui-textfield-helper">支付宝-付钱/收钱-收钱-保存收钱码，并<a href="https://cli.im/deqr"
                                                                              target="_blank">解析二维码</a>，将解析结果粘贴在此处
                    </div>
                </div>
                <div class="mdui-textfield mdui-textfield-floating-label">
                    <i class="mdui-icon material-icons">monetization_on</i>
                    <label class="mdui-textfield-label">微信收款链接</label>
                    <input class="mdui-textfield-input" name="wechat" type="text"/>
                    <div class="mdui-textfield-helper">微信-我-支付-收付款-二维码收款-保存收款码，并<a href="https://cli.im/deqr"
                                                                                   target="_blank">解析二维码</a>，将解析结果粘贴在此处
                    </div>
                </div>
                <div class="mdui-textfield mdui-textfield-floating-label">
                    <i class="mdui-icon material-icons">monetization_on</i>
                    <label class="mdui-textfield-label">QQ 收款链接</label>
                    <input class="mdui-textfield-input" name="qqpay" type="text"/>
                    <div class="mdui-textfield-helper">QQ-QQ钱包-收付款-收款-保存收款码，并<a href="https://cli.im/deqr"
                                                                                target="_blank">解析二维码</a>，将解析结果粘贴在此处
                    </div>
                </div>
                <div class="mdui-typo-body-2"><br>*如需添加更多支付方式，请在完成本页面后自行编辑 config.php<br></div>
                <div class="mdui-textfield mdui-textfield-floating-label">
                    <i class="mdui-icon material-icons">image</i>
                    <label class="mdui-textfield-label">头像链接</label>
                    <input class="mdui-textfield-input" name="avatar_url" type="text"/>
                    <div class="mdui-textfield-helper">默认为 <a href="https://secure.gravatar.com/avatar/"
                                                              target="_blank">https://secure.gravatar.com/avatar/</a>
                    </div>
                </div>
                <br>
                <div class="mdui-row-xs-3">
                    <div class="mdui-col">
                        <button class="mdui-btn mdui-btn-block mdui-color-theme-accent mdui-ripple"
                                mdui-dialog="{target: '#set-theme'}" type="button">设置主题
                        </button>
                    </div>
                    <div class="mdui-col">
                    </div>
                    <div class="mdui-col">
                        <button class="mdui-btn mdui-btn-block mdui-color-theme-accent mdui-ripple" type="submit">完成安装
                        </button>
                    </div>
                </div>
        </div>
    </div>

    <div class="mdui-dialog" id="set-theme">
        <div class="mdui-dialog-title">设置主题</div>
        <div class="mdui-dialog-content">

            <p class="mdui-typo-title mdui-text-color-theme">主色</p>
            <div class="mdui-row-xs-1 mdui-row-sm-2 mdui-row-md-3">
                <div class="mdui-col mdui-text-color-amber">
                    <label class="mdui-radio mdui-m-b-1">
                        <input type="radio" name="theme-primary" value="amber">
                        <i class="mdui-radio-icon"></i>
                        Amber
                    </label>
                </div>
                <div class="mdui-col mdui-text-color-blue">
                    <label class="mdui-radio mdui-m-b-1">
                        <input type="radio" name="theme-primary" value="blue">
                        <i class="mdui-radio-icon"></i>
                        Blue
                    </label>
                </div>
                <div class="mdui-col mdui-text-color-blue-grey">
                    <label class="mdui-radio mdui-m-b-1">
                        <input type="radio" name="theme-primary" value="blue-grey">
                        <i class="mdui-radio-icon"></i>
                        Blue Grey
                    </label>
                </div>
                <div class="mdui-col mdui-text-color-brown">
                    <label class="mdui-radio mdui-m-b-1">
                        <input type="radio" name="theme-primary" value="brown">
                        <i class="mdui-radio-icon"></i>
                        Brown
                    </label>
                </div>
                <div class="mdui-col mdui-text-color-cyan">
                    <label class="mdui-radio mdui-m-b-1">
                        <input type="radio" name="theme-primary" value="cyan">
                        <i class="mdui-radio-icon"></i>
                        Cyan
                    </label>
                </div>
                <div class="mdui-col mdui-text-color-deep-orange">
                    <label class="mdui-radio mdui-m-b-1">
                        <input type="radio" name="theme-primary" value="deep-orange">
                        <i class="mdui-radio-icon"></i>
                        Deep Orange
                    </label>
                </div>
                <div class="mdui-col mdui-text-color-deep-purple">
                    <label class="mdui-radio mdui-m-b-1">
                        <input type="radio" name="theme-primary" value="deep-purple">
                        <i class="mdui-radio-icon"></i>
                        Deep Purple
                    </label>
                </div>
                <div class="mdui-col mdui-text-color-green">
                    <label class="mdui-radio mdui-m-b-1">
                        <input type="radio" name="theme-primary" value="green">
                        <i class="mdui-radio-icon"></i>
                        Green
                    </label>
                </div>
                <div class="mdui-col mdui-text-color-grey">
                    <label class="mdui-radio mdui-m-b-1">
                        <input type="radio" name="theme-primary" value="grey">
                        <i class="mdui-radio-icon"></i>
                        Grey
                    </label>
                </div>
                <div class="mdui-col mdui-text-color-indigo">
                    <label class="mdui-radio mdui-m-b-1">
                        <input type="radio" name="theme-primary" value="indigo">
                        <i class="mdui-radio-icon"></i>
                        Indigo
                    </label>
                </div>
                <div class="mdui-col mdui-text-color-light-blue">
                    <label class="mdui-radio mdui-m-b-1">
                        <input type="radio" name="theme-primary" value="light-blue">
                        <i class="mdui-radio-icon"></i>
                        Light Blue
                    </label>
                </div>
                <div class="mdui-col mdui-text-color-light-green">
                    <label class="mdui-radio mdui-m-b-1">
                        <input type="radio" name="theme-primary" value="light-green">
                        <i class="mdui-radio-icon"></i>
                        Light Green
                    </label>
                </div>
                <div class="mdui-col mdui-text-color-lime">
                    <label class="mdui-radio mdui-m-b-1">
                        <input type="radio" name="theme-primary" value="lime">
                        <i class="mdui-radio-icon"></i>
                        Lime
                    </label>
                </div>
                <div class="mdui-col mdui-text-color-orange">
                    <label class="mdui-radio mdui-m-b-1">
                        <input type="radio" name="theme-primary" value="orange">
                        <i class="mdui-radio-icon"></i>
                        Orange
                    </label>
                </div>
                <div class="mdui-col mdui-text-color-pink">
                    <label class="mdui-radio mdui-m-b-1">
                        <input type="radio" name="theme-primary" value="pink">
                        <i class="mdui-radio-icon"></i>
                        Pink
                    </label>
                </div>
                <div class="mdui-col mdui-text-color-purple">
                    <label class="mdui-radio mdui-m-b-1">
                        <input type="radio" name="theme-primary" value="purple">
                        <i class="mdui-radio-icon"></i>
                        Purple
                    </label>
                </div>
                <div class="mdui-col mdui-text-color-red">
                    <label class="mdui-radio mdui-m-b-1">
                        <input type="radio" name="theme-primary" value="red">
                        <i class="mdui-radio-icon"></i>
                        Red
                    </label>
                </div>
                <div class="mdui-col mdui-text-color-teal">
                    <label class="mdui-radio mdui-m-b-1">
                        <input type="radio" name="theme-primary" value="teal" checked="">
                        <i class="mdui-radio-icon"></i>
                        Teal
                    </label>
                </div>
                <div class="mdui-col mdui-text-color-yellow">
                    <label class="mdui-radio mdui-m-b-1">
                        <input type="radio" name="theme-primary" value="yellow">
                        <i class="mdui-radio-icon"></i>
                        Yellow
                    </label>
                </div>
            </div>

            <p class="mdui-typo-title mdui-text-color-theme-accent">强调色</p>
            <div class="mdui-row-xs-1 mdui-row-sm-2 mdui-row-md-3">
                <div class="mdui-col mdui-text-color-amber">
                    <label class="mdui-radio mdui-m-b-1">
                        <input type="radio" name="theme-accent" value="amber">
                        <i class="mdui-radio-icon"></i>
                        Amber
                    </label>
                </div>
                <div class="mdui-col mdui-text-color-blue">
                    <label class="mdui-radio mdui-m-b-1">
                        <input type="radio" name="theme-accent" value="blue">
                        <i class="mdui-radio-icon"></i>
                        Blue
                    </label>
                </div>
                <div class="mdui-col mdui-text-color-cyan">
                    <label class="mdui-radio mdui-m-b-1">
                        <input type="radio" name="theme-accent" value="cyan">
                        <i class="mdui-radio-icon"></i>
                        Cyan
                    </label>
                </div>
                <div class="mdui-col mdui-text-color-deep-orange">
                    <label class="mdui-radio mdui-m-b-1">
                        <input type="radio" name="theme-accent" value="deep-orange">
                        <i class="mdui-radio-icon"></i>
                        Deep Orange
                    </label>
                </div>
                <div class="mdui-col mdui-text-color-deep-purple">
                    <label class="mdui-radio mdui-m-b-1">
                        <input type="radio" name="theme-accent" value="deep-purple">
                        <i class="mdui-radio-icon"></i>
                        Deep Purple
                    </label>
                </div>
                <div class="mdui-col mdui-text-color-green">
                    <label class="mdui-radio mdui-m-b-1">
                        <input type="radio" name="theme-accent" value="green">
                        <i class="mdui-radio-icon"></i>
                        Green
                    </label>
                </div>
                <div class="mdui-col mdui-text-color-indigo">
                    <label class="mdui-radio mdui-m-b-1">
                        <input type="radio" name="theme-accent" value="indigo" checked="">
                        <i class="mdui-radio-icon"></i>
                        Indigo
                    </label>
                </div>
                <div class="mdui-col mdui-text-color-light-blue">
                    <label class="mdui-radio mdui-m-b-1">
                        <input type="radio" name="theme-accent" value="light-blue">
                        <i class="mdui-radio-icon"></i>
                        Light Blue
                    </label>
                </div>
                <div class="mdui-col mdui-text-color-light-green">
                    <label class="mdui-radio mdui-m-b-1">
                        <input type="radio" name="theme-accent" value="light-green">
                        <i class="mdui-radio-icon"></i>
                        Light Green
                    </label>
                </div>
                <div class="mdui-col mdui-text-color-lime">
                    <label class="mdui-radio mdui-m-b-1">
                        <input type="radio" name="theme-accent" value="lime">
                        <i class="mdui-radio-icon"></i>
                        Lime
                    </label>
                </div>
                <div class="mdui-col mdui-text-color-orange">
                    <label class="mdui-radio mdui-m-b-1">
                        <input type="radio" name="theme-accent" value="orange">
                        <i class="mdui-radio-icon"></i>
                        Orange
                    </label>
                </div>
                <div class="mdui-col mdui-text-color-pink">
                    <label class="mdui-radio mdui-m-b-1">
                        <input type="radio" name="theme-accent" value="pink">
                        <i class="mdui-radio-icon"></i>
                        Pink
                    </label>
                </div>
                <div class="mdui-col mdui-text-color-purple">
                    <label class="mdui-radio mdui-m-b-1">
                        <input type="radio" name="theme-accent" value="purple">
                        <i class="mdui-radio-icon"></i>
                        Purple
                    </label>
                </div>
                <div class="mdui-col mdui-text-color-red">
                    <label class="mdui-radio mdui-m-b-1">
                        <input type="radio" name="theme-accent" value="red">
                        <i class="mdui-radio-icon"></i>
                        Red
                    </label>
                </div>
                <div class="mdui-col mdui-text-color-teal">
                    <label class="mdui-radio mdui-m-b-1">
                        <input type="radio" name="theme-accent" value="teal">
                        <i class="mdui-radio-icon"></i>
                        Teal
                    </label>
                </div>
                <div class="mdui-col mdui-text-color-yellow">
                    <label class="mdui-radio mdui-m-b-1">
                        <input type="radio" name="theme-accent" value="yellow">
                        <i class="mdui-radio-icon"></i>
                        Yellow
                    </label>
                </div>
            </div>
            </form>
        </div>
        <div class="mdui-divider"></div>
        <div class="mdui-dialog-actions">
            <button class="mdui-btn mdui-ripple" mdui-dialog-confirm="">确定</button>
        </div>
    </div>
    <br><br><hr/>
    <div class="mdui-container mdui-typo center">
        <div class="mdui-typo-body-2-opacity">请确认您在访问</div>
        <div class="mdui-chip mdui-hoverable">
            <span class="mdui-chip-icon <?php echo (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on' || (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https')) ? 'mdui-color-green' : '';?>"><i class="mdui-icon material-icons"><?php echo (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on' || (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https')) ? 'https' : 'http';?></i></span>
            <span class="mdui-chip-title"><?php $scheme = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on' || (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https')) ? 'https://' : 'http://'; echo $scheme.$_SERVER['HTTP_HOST'];?></span>
        </div>
        <div class="mdui-typo-caption">Powered by <a style="color:<?=PRIMARY_THEME?>" href="https://github.com/FIFCOM/multi_qr_pay" target="_blank">multi_qr_pay</a> Installer</div><br><br>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/mdui@1.0.1/dist/js/mdui.min.js"
        integrity="sha384-gCMZcshYKOGRX9r6wbDrvF+TcCCswSHFucUzUPwka+Gr+uHgjlYvkABr95TCOz3A"
        crossorigin="anonymous"
></script>
</body>
</html>