<?php
/**
 *
 * @arParam массив праметров компонента
 * @arResult массив результата
 * @arItem массив отдельного элемента
 */

$arResult = array(
    array(
        'id' => '1',
        'title'=>'Понятность лекций',
        'desc' =>'Умение объяснять и ясно доносить знания студентам; 1 – ничего не понятно, 5 – все объясняет',
        'my_number' => '0',
        'count' => '0',
        'number' => '0',
    ),
    array(
        'id' => '2',
        'desc'=> 'Актуальность и новизна информации; 1 – одни лекции, 5 – использование презентаций, наглядных материалов и др.',
        'title'=>'Интерес к лекциям',
        'my_number' => '0',
        'count' => '0',
        'number' => '0'
    ),
    array(
        'id' => '3',
        'title'=>'Чувство юмора',
        'desc' =>'Способность видеть смешное в рассказе, окружении или ситуации; 1 - чувство юмора отсутствует , 5 - веселый тип(тётка), не соскучишься',
        'my_number' => '0',
        'count' => '0',
        'number' => '0',
        'number_percent'=> '0'
    ),
    array(
        'id' => '4',
        'desc' => 'Способности побудить студентов к действию; 1 - абсолютно не требовательный, 5 - точное и полное выполнение всех заданий',
        'title'=>'Требовательность',
        'my_number' => '0',
        'count' => '0',
        'number' => '0'
    ),
    array(
        'id' => '5',
        'title'=>'Отношение к студентам',
        'desc' =>'Легкость общения со студентами; 1 - пары проходят в напряженной обстановке, 5 - одно удовольствие посещать занятия',
        'my_number' => '0',
        'count' => '0',
        'number' => '0'
    ),
    array(
        'id' => '6',
        'desc' =>'Посещаемость занятий студентами; 1 - сессия - вчера познакомились, 5 - ходить и только ходить',
        'title'=>'Посещаемость',
        'my_number' => '0',
        'count' => '0',
        'number' => '0',
    )
);

// Выборка
$arResultTemp = Database::select('all','assess',
    '', $arParam['table'].'_id="'.$arParam["id"].'"',
    '', '');


foreach($arResultTemp as $arResultTempItem){
    for($i=1;$i<=6;$i++) {
        // Собораем все ответы
        $arResult[$i-1]['number'] += $arResultTempItem['value_'.$i];
        // Считаем общее количество
        if($arResultTempItem['value_'.$i] != 0){
            $arResult[$i-1]['count']++ ;
        }
        // Определяем что ответил пользователь
        if($arResultTempItem['anonymous_id'] == $_COOKIE['anonymous_id']){
            $arResult[$i-1]['my_number'] = $arResultTempItem['value_'.$i];
        }
    }
}

for($i=0;$i<=5;$i++) {
    if ($arResult[$i]['number'] != 0) {
        $arResult[$i]['number'] = round($arResult[$i]['number'] / $arResult[$i]['count'], 2);
    } else {
        $arResult[$i]['number'] = 0;
    }
}