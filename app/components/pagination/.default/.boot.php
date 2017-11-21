<?php
/**
 *
 * @arParam массив праметров компонента
 * @arResult массив результата
 * @arItem массив отдельного элемента
 */
    if ($arParam['pagination'] === false) return false;

    $all = $arParam['all'];
    $count = $arParam['count'];

    for($i = 1; $i <= ceil($all/$count); $i++){
        if($i >= _APPLICATION['PAGE'] - 3 AND $i <= _APPLICATION['PAGE'] + 5) {
            $arResult[$i]['number'] = $i;
            if(_APPLICATION['PAGE'] == $i - 1) $arResult[$i]['active'] = true ;
            $arResult[$i]['url'] = '?page='.$i;
        }
    }
