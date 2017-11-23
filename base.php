<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);


require_once($_SERVER['DOCUMENT_ROOT'].'/.config.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/app/models/database.php');





//for ($i = 1; $i<= 200; $i ++) {
//    // Если таккой еллемент есть
//    if($arResult = Database::select('one','assess',
//        '','id ='.$i,'','','')){
//        $arResult =
//
//
//            Database::insert('assess',$arResult);
//    }
//}

Database::connect();

echo '1';