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
    if(empty($arAjax['id']) OR empty($arAjax['value_id'])) $status = false;
    if($arAjax['value_number'] > 5 OR $arAjax['value_number'] < 0) $status = false;

    if($status == true ) {

        $arResult = Database::select('one', $arAjax['table'],
            '', 'id="' . $arAjax["id"] . '"',
            '', '');


        $arBase['country_id'] = $arResult['country_id'];
        $arBase['region_id'] = $arResult['region_id'];
        $arBase['city_id'] = $arResult['city_id'];
        $arBase['university_id'] = $arResult['university_id'];

        $arBase['anonymous_id'] = Anonymous::get_id();
        $arBase[$arAjax['table'] . '_id'] = $arAjax['id'];
        $arBase['value_' . $arAjax['value_id']] = $arAjax['value_number'];
        $arBase['date'] = date("Y-m-d H:i:s");


        if ($id = Database::check('assess',
            $arAjax['table'] . '_id = "' . $arAjax['id'] . '" AND
        anonymous_id = "' . $arBase['anonymous_id'] . '"
        ')) {
            Database::update('assess', 'id = "' . $id . '"', [
                'value_' . $arAjax['value_id'] => $arAjax['value_number'],
                'date' => date("Y-m-d H:i:s")
            ]);
        } else {
            Database::insert('assess', $arBase);
        }
    }


    Application::component('assess', 'add', '',
    [
        "table" => "teacher",
        "id" => $arAjax['id'],
    ]);


