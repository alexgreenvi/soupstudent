<?php
/**
 *
 * @arParam массив праметров компонента
 * @arResult массив результата
 * @arItem массив отдельного элемента
 */

$arResult = Database::select('one', 'region',
    "", "id = '"._APPLICATION['ELEMENT_CODE']."'",
    "", "");


// Обновляем все данные
if($arResult['date'] !== date("Y-m-d")) {
    $arBase['university_count'] = Database::count('university',"region_id = '".$arResult['id']."'");
    $arBase['ball'] = getBall('region',$arResult['id']);
    $arBase['date'] = date("Y-m-d");

    Database::update('region',"id = '"._APPLICATION['ELEMENT_CODE']."'",$arBase);
}
