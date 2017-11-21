<?php
/**
 *
 * @arParam массив праметров компонента
 * @arResult массив результата
 * @arItem массив отдельного элемента
 */
// Выборка
$arResultRegion = Database::select('all','region',
    '', '', '', ' name');

if(isset($arParam['region_id'])){
    $arResultCity = Database::select('all','city',
        '', 'region_id = "'.$arParam['region_id'].'"', '', ' name');
}

if(isset($arParam['city_id'])){
    $arResultUniversity = Database::select('all','university',
        '', 'city_id = "'.$arParam['city_id'].'"', '', ' name');
}


if($arParam['region_id'] !=0 AND $arParam['city_id'] != 0 AND
    !Database::check('city', 'id = '.$arParam['city_id'] .' AND region_id = '.$arParam['region_id'].'')) {
    unset($arParam['city_id']);
    unset($arParam['university_id']);
    unset($arResultUniversity);
}
if($arParam['city_id'] !=0 AND $arParam['university_id'] != 0 AND
    !Database::check('university', 'id = '.$arParam['university_id'] .' AND city_id = '.$arParam['city_id'].'')) {
    unset($arParam['university_id']);
}