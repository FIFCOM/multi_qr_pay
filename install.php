<?php
if (!file_exists('config.php')) {

} else {
    echo '已安装，如需重新安装，请删除当前目录下的 config.php (建议先备份) 后重新访问本页面.<br>multi_qr_pay';
}
?>
<!doctype html>
<html lang="zh-cmn-Hans">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="keywords" content="multi_qr_pay"/>
    <link rel="shortcut icon" href="https://fifcom.cn/avatar/?transparent=1"/>
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
                        <td> >= 7.3 </td>
                        <td><?=PHP_VERSION."(".PHP_VERSION_ID.")"?></td>
                        <td><?php echo PHP_VERSION_ID >= 70300 ? "true" : "false"?></td>
                    </tr>
                    <tr>
                        <td>SSL</td>
                        <td>https</td>
                        <td><?php echo (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on' || (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https'))? 'https' : 'http';?></td>
                        <td><?php echo (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on' || (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https'))? 'true' : 'false';?></td>
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

        <div class="mdui-textfield mdui-textfield-floating-label">
            <i class="mdui-icon material-icons">account_circle</i>
            <label class="mdui-textfield-label">姓名 / 昵称</label>
            <input class="mdui-textfield-input" type="text" required/>
            <div class="mdui-textfield-error">*必填，不能为空</div>
        </div>
            <div class="mdui-textfield mdui-textfield-floating-label">
                <i class="mdui-icon material-icons">monetization_on</i>
                <label class="mdui-textfield-label">支付宝收款链接</label>
                <input class="mdui-textfield-input" type="text"/>
                <div class="mdui-textfield-helper">支付宝-付钱/收钱-收钱-保存收钱码，并<a href="https://cli.im/deqr" target="_blank">解析二维码</a>，将解析结果粘贴在此处</div>
            </div>
            <div class="mdui-textfield mdui-textfield-floating-label">
                <i class="mdui-icon material-icons">monetization_on</i>
                <label class="mdui-textfield-label">微信收款链接</label>
                <input class="mdui-textfield-input" type="text"/>
                <div class="mdui-textfield-helper">微信-我-支付-收付款-二维码收款-保存收款码，并<a href="https://cli.im/deqr" target="_blank">解析二维码</a>，将解析结果粘贴在此处</div>
            </div>
            <div class="mdui-textfield mdui-textfield-floating-label">
                <i class="mdui-icon material-icons">monetization_on</i>
                <label class="mdui-textfield-label">QQ 收款链接</label>
                <input class="mdui-textfield-input" type="text"/>
                <div class="mdui-textfield-helper">QQ-QQ钱包-收付款-收款-保存收款码，并<a href="https://cli.im/deqr" target="_blank">解析二维码</a>，将解析结果粘贴在此处</div>
            </div>
            <div class="mdui-typo-body-2"><br>*如需添加更多支付方式，请在完成本页面后自行编辑 config.php<br></div>
            <div class="mdui-textfield mdui-textfield-floating-label">
                <i class="mdui-icon material-icons">image</i>
                <label class="mdui-textfield-label">头像链接</label>
                <input class="mdui-textfield-input" type="text"/>
                <div class="mdui-textfield-helper">默认为 <a href="https://secure.gravatar.com/avatar/" target="_blank">https://secure.gravatar.com/avatar/</a></div>
            </div>
        </div>
    </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/mdui@1.0.1/dist/js/mdui.min.js"
            integrity="sha384-gCMZcshYKOGRX9r6wbDrvF+TcCCswSHFucUzUPwka+Gr+uHgjlYvkABr95TCOz3A"
            crossorigin="anonymous"
    ></script>
</body>
</html>