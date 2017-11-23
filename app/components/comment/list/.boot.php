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

    if($arResult[$i]['anonymous_id'] == $_COOKIE['anonymous_id']){
        $arResult[$i]['anonymous']['name'] = 'Ваша рекомендация';
    }else{
        $arResult[$i]['anonymous']['name'] = 'Аноним';
    }




}
