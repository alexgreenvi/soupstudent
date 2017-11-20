<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/.config.php');

require_once 'core/route.php';
require_once 'core/database.php';
require_once 'core/application.php';
require_once 'core/anonymous.php';

Database::connect();
Route::start();
Database::close();