<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/.config.php');

require_once 'models/route.php';
require_once 'models/database.php';
require_once 'models/application.php';
require_once 'models/anonymous.php';

Database::connect();
Route::start();
Database::close();