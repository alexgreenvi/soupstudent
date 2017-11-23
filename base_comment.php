<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

require_once($_SERVER['DOCUMENT_ROOT'].'/.config.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/app/models/database.php');

Database::connect();

// Выбираем комментарии
$arResult = Database::select('all','comment_old',
        '','',[0,5000],'','');

foreach ($arResult as $arItem){
    // Удаляем
    Database::delete('comment_old','id = "'.$arItem['id'].'"');

    if(strlen($arItem['text']) >= 50 ){
        // Добавляем
        $arBase['country_id'] = $arItem['country_id'];
        $arBase['region_id'] = $arItem['region_id'];
        $arBase['city_id'] = $arItem['city_id'];
        $arBase['university_id'] = $arItem['university_id'];

        $arBase['anonymous_id'] = 0;
        $arBase['teacher_id'] = $arItem['teacher_id'];
        $arBase['text'] = $arItem['text'];
        $arBase['date'] = date("Y-m-d H:i:s");

        Database::insert('comment',$arBase);
    }else{
        echo $arItem['text'].' - '.strlen($arItem['text']).'<br>';
    }
}