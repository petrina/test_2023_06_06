<?php

require_once './Lib/App.php';

error_reporting(E_ALL);
ini_set('display_errors', 'on');

$app = new App();
$app->build();