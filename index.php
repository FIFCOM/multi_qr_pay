<?php
require_once('config.php');
require_once('functions.php');
$payment = $_REQUEST['payment'] ?? 0;

redirect($_SERVER['HTTP_USER_AGENT'], $payment, $scheme);

require_once('index.html.php');