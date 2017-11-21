<?php
/**
 *
 * @arParam массив праметров компонента
 * @arResult массив результата
 * @arItem массив отдельного элемента
 */

// Выборка
    $arResult = Database::select('all','assess',
    array('id','value_3'), $arParam['where'],
    array(0,10), 'id DESC');
    $i = 3;
    $step = 15;
