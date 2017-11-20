<?php
/**
 *
 * @arParam массив праметров компонента
 * @arResult массив результата
 * @arItem массив отдельного элемента
 */

// Выборка
$arResult = Database::select('all','comment',
    '', $arParam['table'].'_id="'.$arParam["id"].'"',
    array(
        _APPLICATION['PAGE'] * $arParam['count'],
        $arParam['count'])
    , ''
    );

$arParam['all'] = Database::count('comment',
    $arParam['table'].'_id="'.$arParam['id'].'"');

for ($i = 0; $i < count($arResult); $i++) {
    if($arResult[$i]['university_id']) {
        $arResult[$i]['university'] = Database::select('one','university',
            array('id','name'), "id = ".$arResult[$i]['university_id'],
            "", "");
    }
    if($arResult[$i]['city_id']){
        $arResult[$i]['city'] = Database::select('one','city',
            array('id','name'), "id = ".$arResult[$i]['city_id'],
            "", "");
    }
    if($arResult[$i]['teacher_id']){
        $arResult[$i]['teacher'] = Database::select('one','teacher',
            array('id','name'), "id = ".$arResult[$i]['teacher_id'],
            "", "");
    }

}
