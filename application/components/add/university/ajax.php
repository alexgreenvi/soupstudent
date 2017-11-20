<?php
/**
 * @arParam массив праметров компонента
 * @arResult массив результата
 * @arItem массив отдельного элемента
 * @arAjax массив отдельного элемента
 */
// Подключаем ajax >>
require_once($_SERVER['DOCUMENT_ROOT'] . '/application/ajax.php');
// ..
// ..
    // Проверка значений
    if(
        !empty($arAjax['region_id']) AND
        !empty($arAjax['city_id']) AND
        !empty($arAjax['name']) AND
        $arAjax['status'] == true
    ) {
            $name_search = trim(strtoupper($arAjax['name'])," ");

            if($id = Database::check('university',
                'city_id = "'.$arAjax['city_id'] .'" AND
                    UPPER(name) LIKE "%'.$name_search.'%"
                    '))
            {
                $arResultTemp = Database::select('one', 'university','','id = '.$id,'','','');
                $url = getUrl($arResultTemp,'university');
                $arAjax['log'] = 'Такой ВУЗ уже есть в базе <a href="'.$url.'" title="'.$arResultTemp['name'].'"><span>'.$arResultTemp['name'].'</span></a>';
            }else{
                $arResult = Database::select('one', 'city',
                    '', 'id = "' . $arAjax["city_id"] . '"',
                    '', '');

                $arBase['country_id'] = $arResult['country_id'];
                $arBase['region_id'] = $arResult['region_id'];
                $arBase['city_id'] = $arResult['id'];

                $arBase['name'] = $arAjax['name'];
                $arBase['name_transcript'] = '';
                $arBase['address'] = '';
                $arBase['phone'] = '';
                $arBase['website'] = '';
                $arBase['email'] = '';
                $arBase['date'] = date("Y-m-d");

                //Database::insert('university', $arBase);

                $arAjax['name'] = '';
            }
    }

    Application::component('add', 'university', '',
    [
        "region_id" => $arAjax['region_id'],
        "city_id" => $arAjax['city_id'],
        "name" => $arAjax['name'],
        "log" => $arAjax['log']
    ]);
