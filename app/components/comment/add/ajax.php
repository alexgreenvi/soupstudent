<?php
/**
 * @arParam массив праметров компонента
 * @arResult массив результата
 * @arItem массив отдельного элемента
 * @arAjax массив отдельного элемента
 */
// Подключаем ajax >>
require_once($_SERVER['DOCUMENT_ROOT'] . '/app/ajax.php');
// ..
    $status = true;

    // Проверка значений
    if(empty($arAjax['id']) OR empty($arAjax['text'])) $status = false;

    if($status == true ) {

        $arResult = Database::select('one',$arAjax['table'],
            '', 'id="'.$arAjax["id"].'"',
            '','');

        $arBase['country_id'] = $arResult['country_id'];
        $arBase['region_id'] = $arResult['region_id'];
        $arBase['city_id'] = $arResult['city_id'];
        $arBase['university_id'] = $arResult['university_id'];

        $arBase['anonymous_id'] = Anonymous::get_id();
        $arBase[$arAjax['table'].'_id'] = $arAjax['id'];
        $arBase['text'] = getTextInBase($arAjax['text']);

        $arBase['date'] = date("Y-m-d H:i:s");

        if($id = Database::check('comment',
            $arAjax['table'].'_id = "'.$arAjax['id'] .'" AND
            anonymous_id = "'.$arBase['anonymous_id'].'"
            ')){
            Database::update('comment','id = "'.$id.'"', [
                'text' => $arAjax['text'],
                'date' => date("Y-m-d H:i:s")
            ]);
        }else{
            Database::insert('comment',$arBase);
        }

        $arAjax['text'] = null;
    }


    Application::component('comment', 'add', '',
    [
        "table" => $arAjax['table'],
        "id" => $arAjax['id'],
        'count' => "20",
        'text' => $arAjax['text']
    ]);

    Application::component('comment', 'list', '',
    [
        "table" => $arAjax['table'],
        "id" => $arAjax['id'],
        'count' => "20"
    ]);


