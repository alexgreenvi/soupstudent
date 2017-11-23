<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

require_once($_SERVER['DOCUMENT_ROOT'].'/.config.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/app/models/database.php');

Database::connect();

// Выбираем комментарии
$arResult = Database::select('all','assess_old',
        '','',[0,10000],'','');

foreach ($arResult as $arItem){
    // Удаляем
    Database::delete('assess_old','id = "'.$arItem['id'].'"');

    for ($i = 1 ; $i <= 6; $i++){
        if($arItem['value_'.$i] >= 6 ){
            $arBase['value_'.$i] = 5;
        }else{
            $arBase['value_'.$i] = $arItem['value_'.$i];
        }
    }
     // Добавляем
    $arBase['country_id'] = $arItem['country_id'];
    $arBase['region_id'] = $arItem['region_id'];
    $arBase['city_id'] = $arItem['city_id'];
    $arBase['university_id'] = $arItem['university_id'];

    $arBase['anonymous_id'] = 0;
    $arBase['teacher_id'] = $arItem['teacher_id'];
    $arBase['date'] = date("Y-m-d H:i:s");
    if($arBase['teacher_id'] != 0) {
        Database::insert('assess',$arBase);
    }
}