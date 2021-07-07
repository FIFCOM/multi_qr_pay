<?php
require_once('config.php');
require_once('functions.php');
$payment = $_REQUEST['payment'] ?? '';

redirect($payment);

require_once('index.html.php');