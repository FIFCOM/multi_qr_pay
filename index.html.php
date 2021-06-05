<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title><?php echo $payment ? '使用'.strtoupper($payment) : '';?>向<?=NAME?>付款</title>
  <link rel="shortcut icon" href="<?=AVATAR_URL?>"/>
  <style>.center {text-align: center}</style>
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/mdui@1.0.1/dist/css/mdui.min.css"/>
</head>
<body>

<div class="mdui-appbar mdui-shadow-0 mdui-theme-primary-<?=PRIMARY_THEME?> mdui-theme-accent-<?=ACCENT_THEME?>">
  <div class="mdui-tab mdui-tab-full-width mdui-color-<?=PRIMARY_THEME?>" mdui-tab>
    <a href="#main" class="mdui-ripple mdui-ripple-white">
      <i class="mdui-icon material-icons">home</i>
      <label><b>主页</b></label>
    </a>
    <?php echo !ALIPAY_URL || ALIPAY_URL == '' ? '<!--' : '';?>
    <a href="#alipay" class="mdui-ripple mdui-ripple-white">
      <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1000 1000" enable-background="new 0 0 36 36" xml:space="preserve"><g><path fill-rule="evenodd" clip-rule="evenodd" fill="#ffffff" d="M598.3,571.5c0,0,25.4-35.1,51-103.9c25.6-68.8,22.9-106.6,22.9-106.6l-205.9-1.6V292l241.5-1.6v-30.2H466.4v-96.6H345.6v96.6H104.1v30.2l241.5-1.6v92.2H152.4v48.3h395.2c0,0-4.1,15.5-18.6,53.6c-14.5,38.1-29.4,61.5-29.4,61.5s-177.2-63.1-270.6-63.1c-93.4,0-206.9,35.3-217.9,141.5C0.3,728.9,64.1,785.8,154,807c89.9,21.2,173-0.6,245.4-35.1c72.3-34.5,143.3-113.1,143.3-113.1l375,177.7c0,0,23.6-34.8,40.6-67.1c17-32.3,31.7-69.1,31.7-69.1L598.3,571.5z M209.8,748.2c-132.4,0-160.2-63.4-160.2-109c0-45.6,27.5-95.2,140.1-102.3c112.6-7.2,264.7,77.8,264.7,77.8S342.2,748.2,209.8,748.2z"/></g></svg>
      <label><b>支付宝</b></label>
    </a>
    <?php echo !ALIPAY_URL || ALIPAY_URL == '' ? '-->' : '';?>
    
    <?php echo !WECHATPAY_URL || WECHATPAY_URL == '' ? '<!--' : '';?>
    <a href="#wechat" class="mdui-ripple mdui-ripple-white">
      <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1000 1000" enable-background="new 0 0 36 36" xml:space="preserve"><g><path fill-rule="evenodd" clip-rule="evenodd" fill="#ffffff" d="M383.6,616.9c-58.7,32.6-67.4-18.3-67.4-18.3l-73.5-170.9c-28.3-81.2,24.5-36.6,24.5-36.6s45.3,34.1,79.6,54.9c34.3,20.8,73.5,6.1,73.5,6.1l480.6-221C812.3,121.3,665.8,49.4,500,49.4c-270.6,0-490,191.2-490,427.1C10,612.2,82.6,733,195.8,811.3l-20.4,116.8c0,0-9.9,34.1,24.5,18.3c23.5-10.8,83.4-49.4,119-73c56,19.5,117.1,30.3,181.1,30.3c270.6,0,490-191.2,490-427.1c0-68.3-18.5-132.9-51.2-190.1C785.6,378.2,429.5,591.4,383.6,616.9L383.6,616.9L383.6,616.9z"/></g></svg>
      <label><b>微信支付</b></label>
    </a>
    <?php echo !WECHATPAY_URL || WECHATPAY_URL == '' ? '-->' : '';?>
    
    <?php echo !QQPAY_URL || QQPAY_URL == '' ? '<!--' : '';?>
    <a href="#qqpay" class="mdui-ripple mdui-ripple-white">
      <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1000 1000" enable-background="new 0 0 36 36" xml:space="preserve"><g><path fill-rule="evenodd" clip-rule="evenodd" fill="#ffffff" d="M956.9,664.5c-21.2-119.4-110-197.6-110-197.6C859.6,358.6,813,339.3,813,339.3C803.2,4,506.3,9.9,500,10c-6.2-0.2-303.3-6-313,329.3c0,0-46.6,19.2-33.9,127.6c0,0-88.9,78.2-110,197.6c0,0-11.3,201.7,101.6,24.7c0,0,25.4,67.2,71.9,127.6c0,0-83.2,27.5-76.2,98.8c0,0-2.8,79.5,177.7,74.1c0,0,127-9.6,165.1-61.7h16.6h0.3h16.6c38.1,52.1,165.1,61.7,165.1,61.7c180.5,5.5,177.7-74.1,177.7-74.1c7-71.3-76.2-98.8-76.2-98.8c46.6-60.4,71.9-127.6,71.9-127.6C968.1,866.2,956.9,664.5,956.9,664.5z"/></g></svg>
      <label><b>QQ支付</b></label>
    </a>
    <?php echo !QQPAY_URL || QQPAY_URL == '' ? '-->' : '';?>
    
    <?php echo !morePayment($MORE_PAYMENT) ? '<!--' : '';?>
    <a href="#more" class="mdui-ripple mdui-ripple-white">
      <i class="mdui-icon material-icons">more_horiz</i>
      <label><b>更多</b></label>
    </a>
    <?php echo !morePayment($MORE_PAYMENT) ? '-->' : '';?>
  </div>
</div>

<div class="mdui-container-fluid">
  <?php echo !ALIPAY_URL || ALIPAY_URL == '' ? '<!--' : '';?>
  <div id="alipay">
    <div class="mdui-container mdui-typo center">
    <br><div class="mdui-typo-title"><p>支付宝扫一扫<?php echo strpos($_SERVER['HTTP_USER_AGENT'], 'Alipay') ? '或点击下方按钮' : '';?><br>向 <?=NAME?> 付款</p></div><br>
    <?php echo strpos($_SERVER['HTTP_USER_AGENT'], 'Alipay') ? '' : '<!--';?>
    <a href="<?=ALIPAY_URL?>" class="mdui-btn mdui-btn-raised mdui-ripple mdui-color-<?=ACCENT_THEME?>">立即付款</a><br><br><br>
    <?php echo strpos($_SERVER['HTTP_USER_AGENT'], 'Alipay') ? '' : '-->';?>
    <img src="https://www.zhihu.com/qrcode?url=<?=urlencode(ALIPAY_URL)?>" width="300" height="300" alt=""><hr/>
    </div>
  </div>
  <?php echo !ALIPAY_URL || ALIPAY_URL == '' ? '-->' : '';?>
  
  
  <?php echo !WECHATPAY_URL || WECHATPAY_URL == '' ? '<!--' : '';?>
  <div id="wechat">
    <div class="mdui-container mdui-typo center">
    <br><div class="mdui-typo-title"><p><?php echo strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') ? '长按识别二维码' : '微信扫一扫';?><br>向 <?=NAME?> 付款</p></div><br>
    <img src="https://www.zhihu.com/qrcode?url=<?=urlencode(WECHATPAY_URL)?>" width="300" height="300" alt=""><hr/>
    </div>
  </div>
  <?php echo !WECHATPAY_URL || WECHATPAY_URL == '' ? '-->' : '';?>
  
  <?php echo !QQPAY_URL || QQPAY_URL == '' ? '<!--' : '';?>
  <div id="qqpay">
    <div class="mdui-container mdui-typo center">
    <br><div class="mdui-typo-title"><p><?php echo strpos($_SERVER['HTTP_USER_AGENT'], 'QQ/') ? '长按识别二维码' : 'QQ 扫一扫';?><br>向 <?=NAME?> 付款</p></div><br>
    <img src="https://www.zhihu.com/qrcode?url=<?=urlencode(QQPAY_URL)?>" width="300" height="300" alt=""><hr/>
    </div>
  </div>
  <?php echo !QQPAY_URL || QQPAY_URL == '' ? '-->' : '';?>
  
  <?php echo !morePayment($MORE_PAYMENT) ? '<!--' : '';?>
  <div id="more">
    <?php printMorePayment($MORE_PAYMENT); ?>
  </div>
  <?php echo !morePayment($MORE_PAYMENT) ? '-->' : '';?>
  
  <div id="main">
    <div class="mdui-container mdui-typo center">
    <br><div class="mdui-typo-title"><p>扫一扫<br>向 <?=NAME?> 付款</p></div><br>
    <img src="https://www.zhihu.com/qrcode?url=<?=urlencode($scheme.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'])?>" width="300" height="300" alt=""><hr/>
    </div>
  </div>
  
  <div class="mdui-container mdui-typo center">
    <div class="mdui-typo-body-2-opacity">请确认您在访问</div>
    <div class="mdui-chip mdui-hoverable">
                <span class="mdui-chip-icon <?php echo $scheme == 'https://' ? 'mdui-color-green' : '';?>"><i class="mdui-icon material-icons"><?php echo $scheme === 'https://' ? 'https' : 'http';?></i></span>
                <span class="mdui-chip-title"><?=$scheme.$_SERVER['HTTP_HOST'];?></span>
    </div>
    <div class="mdui-typo-caption">Powered by <a style="color:<?=PRIMARY_THEME?>" href="https://github.com/FIFCOM/multi_qr_pay" target="_blank">multi_qr_pay</a> v<?=MULTI_QR_PAY_VERSION?></div><br><br>
    </div>
</div>

<script src="//cdn.jsdelivr.net/npm/mdui@1.0.1/dist/js/mdui.min.js"></script>
</body>
</html>