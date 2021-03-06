<?php
/**
 *
 * @arParam массив праметров компонента
 * @arResult массив результата
 * @arItem массив отдельного элемента
 */
// Param
if (!isset($arParam['table'])) $arParam['table'] = '';
if (!isset($arParam['param'])) $arParam['param'] = '';
if (!isset($arParam['where'])) $arParam['where'] = '';
if (!isset($arParam['count'])) $arParam['count'] = 0;
if (!isset($arParam['order'])) $arParam['order'] = '';

// Выборка
$arResult = Database::select('all',$arParam['table'],
    $arParam['param'], $arParam['where'],
    array(_APPLICATION['PAGE'] * $arParam['count'], $arParam['count']) ,
    $arParam['order']
    );

$arParam['all'] = Database::count($arParam['table'], $arParam['where']);

//Определяем
for ($i = 0; $i < count($arResult); $i++) {
    $temp_last_data = null;
    $temp_last_text = null;

    // Город
    if(isset($arResult[$i]['university_id'])) {
        $temp_last_data = "university";
    }
    elseif(isset($arResult[$i]['city_id'])){
        $temp_last_data = "city";
        $temp_last_text = 'г. ';
    }

    $id = $arResult[$i][$temp_last_data."_id"];

    $arTemp = Database::select('one',$temp_last_data, "",
        "id = $id", "", "");

    $arResult[$i]['last_url'] = '/'.$temp_last_data.'/'.$arTemp['id'];
    $arResult[$i]['last_name'] = $temp_last_text.$arTemp['name'];


    // Формируем URL
    $arResult[$i]['url'].= '/'.$arParam['table'];
    $arResult[$i]['url'].= '/'.$arResult[$i]['id'];

    // Рекомендации
    $recommendation = 'нет рекомендаций';
    if($arResult[$i]['comment_count'] == 1) {
        $recommendation = $arResult[$i]['comment_count'].' рекомендация';
    }
    if ($arResult[$i]['comment_count'] > 1 AND $arResult[$i]['comment_count'] <= 4) {
        $recommendation = $arResult[$i]['comment_count'].' рекомендации';
    }
    if ($arResult[$i]['comment_count'] > 4) {
        $recommendation = $arResult[$i]['comment_count'].' рекомендаций';
    }

}




