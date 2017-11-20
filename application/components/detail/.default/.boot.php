<?php
/**
 *
 * @arParam массив праметров компонента
 * @arResult массив результата
 * @arItem массив отдельного элемента
 */

$arResult = Database::select('one',$arParam['table'],
    "", "code = '".$arParam['code']."'",
    "", "");

/**
 *
 * Добвляем параметры
 *
*/

$section_id = $arResult['_section_id'];

$arTemp = Database::select('one','_section', "",
    "id = $section_id", "", "");

$arResult['_section_id_code'] = $arTemp['code'];
$arResult['_section_id_name'] = $arTemp['name'];

$arResult['text'] = htmlspecialchars($arResult['text'], ENT_QUOTES, 'UTF-8');