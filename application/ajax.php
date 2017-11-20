<?php
if(!isset($_POST)) exit;
$arAjax = $_POST;

session_start();
date_default_timezone_set("Europe/Moscow");
header('Content-Type: text/html; charset=utf-8');

require_once($_SERVER['DOCUMENT_ROOT'].'/.config.php');

require_once 'core/route.php';
require_once 'core/database.php';
require_once 'core/application.php';
require_once 'core/anonymous.php';

Database::connect();

// Создаем массив
$arResult = array();
