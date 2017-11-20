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

