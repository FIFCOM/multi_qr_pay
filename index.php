<?php
if (!file_exists('config.php')) {
    $scheme = (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') ? 'https://' : 'http://';
    header("Location: ".$scheme.$_SERVER['HTTP_HOST'].str_replace('/index.php', '/install.php', $_SERVER['PHP_SELF']));
}
require_once('config.php');
require_once('functions.php');
$payment = $_REQUEST['payment'] ?? '';

redirect($payment);

require_once('index.html.php');