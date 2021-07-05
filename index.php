<?php
require_once('config.example.php');
require_once('functions.php');
$payment = $_REQUEST['payment'] ?? '';

init();

redirect($_SERVER['HTTP_USER_AGENT'], $payment, $GLOBALS['scheme']);

require_once('index.html.php');