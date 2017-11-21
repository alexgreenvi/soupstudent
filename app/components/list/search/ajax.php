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
    Application::component('list', 'search', '',
    [
        "text" => $arAjax['text']
    ]);


