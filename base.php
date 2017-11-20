<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/application/boot.php');


for ($i = 1; $i<= 200; $i ++) {
    // Если таккой еллемент есть
    if($arResult = Database::select('one','assess',
        '','id ='.$i,'','','')){
        $arResult =


            Database::insert('assess',$arResult);
    }
}