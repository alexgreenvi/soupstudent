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
        !empty($arAjax['university_id']) AND
        !empty($arAjax['name']) AND
        $arAjax['status'] == true
    ) {
            $name_search = trim(strtoupper($arAjax['name'])," ");

            if($id = Database::check('teacher',
                'university_id = "'.$arAjax['university_id'] .'" AND
                    UPPER(name) LIKE "%'.$name_search.'%"
                    '))
            {
                $arResultTemp = Database::select('one', 'teacher','','id = '.$id,'','','');
                $url = '/teacher/'.$arResultTemp['id'];
                if($arResultTemp['status'] = 3) {
                    $arAjax['log'] = 'Данный преподаватель был исключен из нашего рейтинга, и никогда не сможет в нем учавстровать.';
                }else{
                    $arAjax['log'] = 'Такой преподаватель уже есть в базе: <a href="'.$url.'" title="'.$arResultTemp['name'].'"><span>'.$arResultTemp['name'].'</span></a>';
                }
            }else{
                $arResult = Database::select('one', 'university',
                    '', 'id = "' . $arAjax["university_id"] . '"',
                    '', '');

                $arBase['country_id'] = $arResult['country_id'];
                $arBase['region_id'] = $arResult['region_id'];
                $arBase['city_id'] = $arResult['city_id'];
                $arBase['university_id'] = $arResult['id'];


                $arBase['name'] = $arAjax['name'];
                $arBase['date'] = date("Y-m-d");

                Database::insert('teacher_add', $arBase);

                $arAjax['name'] = '';
                $arAjax['log'] = 'Преподаватель добавлен в очередь, в ближайшее время он появиться на сайте, если вся информации была верна!';
            }
    }

    Application::component('add', 'teacher', '',
    [
        "region_id" => $arAjax['region_id'],
        "city_id" => $arAjax['city_id'],
        "university_id" => $arAjax['university_id'],
        "name" => $arAjax['name'],
        "log" => $arAjax['log']
    ]);
