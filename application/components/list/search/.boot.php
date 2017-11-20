<?php
/**
 *
 * @arParam массив праметров компонента
 * @arResult массив результата
 * @arItem массив отдельного элемента
 */
$arParam['text'] = trim(strtoupper($arParam['text'])," ");
// Выборка
$arResult = Database::select('all','teacher','',
    'status =1 AND name LIKE "%'.$arParam['text'].'%"',
    array(0, 10), '');

// Определяем
for ($i = 0; $i < count($arResult); $i++) {

    $arResult[$i] = getData($arResult[$i]);

    $arResult[$i]['last_url'] = '/university/'.$arResult[$i]['university_id'];
    $arResult[$i]['last_name'] = $arResult[$i]['university']['name'];

    $arResult[$i]['url']  = '/teacher/'.$arResult[$i]['id'];


    // Подсветка текста
    $arResult[$i]['name'] = str_replace($arParam['text'], "<b>".$arParam['text']."</b>", $arResult[$i]['name']);
}
