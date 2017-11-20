<?php
/**
 *
 * @arParam массив праметров компонента
 * @arResult массив результата
 * @arItem массив отдельного элемента
 */

$arResult = Database::select('one', 'city',
    "", "id = '"._APPLICATION['ELEMENT_CODE']."'",
    "", "");


// Обновляем все данные
if($arResult['date'] !== date("Y-m-d")) {
    $arBase['university_count'] = Database::count('university',"city_id = '".$arResult['id']."'");
    $arBase['ball'] = getBall('city',$arResult['id']);
    $arBase['date'] = date("Y-m-d");

    Database::update('city',"id = '"._APPLICATION['ELEMENT_CODE']."'",$arBase);
}
