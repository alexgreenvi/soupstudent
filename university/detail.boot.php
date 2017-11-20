<?php
/**
 *
 * @arParam массив праметров компонента
 * @arResult массив результата
 * @arItem массив отдельного элемента
 *
 */

$arResult = Database::select('one', 'university',
    "", "id = '"._APPLICATION['ELEMENT_CODE']."'",
    "", "");


// Обновляем все данные
if($arResult['date'] !== date("Y-m-d")) {
    $arBase['assess_count']  = Database::count('assess',"university_id = '".$arResult['id']."'");
    $arBase['comment_count'] = Database::count('comment',"university_id = '".$arResult['id']."'");
    $arBase['teacher_count'] = Database::count('teacher',"university_id = '".$arResult['id']."'");
    $arBase['ball'] = getBall('university',$arResult['id']);
    $arBase['date'] = date("Y-m-d");

    Database::update('university',"id = '".$arResult['id']."'",$arBase);
}