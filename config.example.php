<?php

const NAME = '';
const ALIPAY_URL = '';
const WECHAT_URL = '';
const QQPAY_URL = '';

// Add more payment :
// usage : $MORE_PAYMENT['___YOUR___PAYMENT___HERE___'] = '___PAYMENT___URL___HERE___';(支持中文)
$MORE_PAYMENT['examplePayment'] = ''; // DO NOT delete or change
// NOTE : DO NOT delete or change the examplePayment, otherwise it may cause errors.

const AVATAR_URL = 'https://secure.gravatar.com/avatar/';
// Optional theme color :
// amber blue blue-grey brown cyan deep-orange deep-purple green grey indigo
// light-blue light-green lime orange pink purple red teal yellow
const PRIMARY_THEME = 'indigo';
const ACCENT_THEME = 'pink';
// enable  : Forced to use https, use with caution in pure http environment.
// disable : Forced to use http, use with caution if HSTS is enabled on the website.
// auto    : Automatically identify whether https is available.
const TLS_ENCRYPT = 'auto';
const QRCODE_API_URL = 'https://api.qrserver.com/v1/create-qr-code/?size=300x300&data=';

const MULTI_QR_PAY_VERSION = '1.1';
error_reporting(E_ALL);
$_ERROR = array();