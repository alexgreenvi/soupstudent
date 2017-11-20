<?php
/**
 *
 * @arParam массив праметров компонента
 * @arResult массив результата
 * @arItem массив отдельного элемента
 *
 */

$arResult = Database::select('one', 'teacher',
    "", "id = '"._APPLICATION['ELEMENT_CODE']."'",
    "", "");

if($arResult['status'] == 3) header('Location: /');

$arResult = getData($arResult);

// Робот отзыво
$arResultTemp = Database::select('one', 'assess',
    "", "teacher_id = '"._APPLICATION['ELEMENT_CODE']."'",
    "", "");
$arResultTextTemp = array(
    array(
        '0'=>'',
        '1'=>'Вообще не объясняет лекции,', //(прочитайте рекомендации студентов, возможно именно там будет ответы на Ваши вопросы)
        '2'=>'Вообще не объясняет лекции,',
        '3'=>'Неудовлетворительно объясняет лекции,',
        '4'=>'Неудовлетворительно объясняет лекции,',
        '5'=>'Удовлетворительно объясняет лекции,',
        '6'=>'Удовлетворительно объясняет лекции,',
        '7'=>'Хорошо объясняет лекции,',
        '8'=>'Хорошо объясняет лекции,',
        '9'=>'Отлично объясняет лекции,',
        '10'=>'Отлично объясняет лекции,',
    ),
    array(
        '0'=>'',
        '1'=>'а эти лекции получаются совсем неинтересные,',
        '2'=>'а эти лекции получаются совсем неинтересные,',
        '3'=>'а эти лекции получаются не очень интересные,',
        '4'=>'а эти лекции получаются не очень интересные,',
        '5'=>'а эти лекции иногда бываю интересные,',
        '6'=>'а эти лекции иногда бываю интересные,',
        '7'=>'а эти лекции получаются достаточно интересными,',
        '8'=>'а эти лекции получаются достаточно интересными,',
        '9'=>'а эти лекции получаются очень интересные,',
        '10'=>'а эти лекции получаются очень интересные,',

    ),
    array(
        '0'=>'',
        '1'=>'при этом это человек который вообще не шутит',
        '2'=>'при этом это человек который вообще не шутит',
        '3'=>'при этом это человек который почти не шутит',
        '4'=>'при этом это человек который почти не шутит',
        '5'=>'при этом это человек который временами удачно шутит',
        '6'=>'при этом это человек который временами удачно шутит',
        '7'=>'при этом это достаточно веселый человек',
        '8'=>'при этом это достаточно веселый человек',
        '9'=>'при этом это самый веселый человек в данном институте',
        '10'=>'при этом это самый веселый человек в данном институте',
    ),
    array(
        '0'=>'',
        '1'=>'и никого не трогает, если вести себя тихо,',
        '2'=>'и никого не трогает, если вести себя тихо,',
        '3'=>'и иногда что-то спрашивает как преподаватель,',
        '4'=>'и иногда что-то спрашивает как преподаватель,',
        '5'=>'и в меру требовательный преподаватель,',
        '6'=>'и в меру требовательный преподаватель,',
        '7'=>'и требует порядком как преподаватель,',
        '8'=>'и требует порядком как преподаватель,',
        '9'=>'и очень требовательный преподаватель,',
        '10'=>'и очень требовательный преподаватель,',
    ),
    array(
        '0'=>'',
        '1'=>'со студентами зачастую резок и недоброжелательно общается,',
        '2'=>'со студентами зачастую резок и недоброжелательно общается,',
        '3'=>'со студентами может быть необъективным,',
        '4'=>'со студентами может быть необъективным,',
        '5'=>'со студентами почти не общается,',

        '6'=>'со студентами почти не общается,',
        '7'=>'со студентами неплохо общается,',
        '8'=>'со студентами неплохо общается,',
        '9'=>'со студентами общается на ты,',
        '10'=>'со студентами общается на ты,',
    ),
    array(
        '0'=>'',
        '1'=>'ах да чуть не забыли, легко совмещать пары с работой или сном.',
        '2'=>'ах да чуть не забыли, легко совмещать пары с работой или сном.',
        '3'=>'ах да чуть не забыли, прогулял пару, не переживай, завтра ещё будут.',
        '4'=>'ах да чуть не забыли, прогулял пару, не переживай, завтра ещё будут.',
        '5'=>'ах да чуть не забыли, наверное пару пропусков ничего не изменят.',

        '6'=>'ах да чуть не забыли, наверное пару пропусков ничего не изменят.',
        '7'=>'ах да чуть не забыли, если прогулял, будь готов отработать.',
        '8'=>'ах да чуть не забыли, если прогулял, будь готов отработать.',
        '9'=>'ах да чуть не забыли, на пары нужно ходить и только ходить.',
        '10'=>'ах да чуть не забыли, на пары нужно ходить и только ходить.',
    )
);

foreach($arResultTemp as $arResultTempItem){
    for($i=1;$i<=6;$i++) {
        $arResultTempAssessNumber[$i-1]['number'] += $arResultTempItem['value_'.$i];
        if($arResultTempItem['value_'.$i] != 0){ $arResultTempAssessNumber[$i-1]['count']++ ;}
    }
}
for($i=0;$i<6;$i++) {

    if ($arResultTempAssessNumber[$i]['number'] != 0) {
        $arResultTempAssessNumber[$i]['number'] = round($arResultTempAssessNumber[$i]['number'] / $arResultTempAssessNumber[$i]['count'], 1) - 1;
        $arResultTempAssessNumber[$i]['number_percent'] = $arResultTempAssessNumber[$i]['number'] * 100 / 5;
    }else{
        $arResultTempAssessNumber[$i]['number'] = 0;
        $arResultTempAssessNumber[$i]['number_percent'] = 3;
    }
    // Готовим текст
    $arResult['text'] .= $arResultTextTemp[$i][round($arResultTempAssessNumber[$i][number])].' ';
}

$arBase['view_count']  = $arResult['view_count'] + 1;
// Обновляем все данные
if($arResult['date'] !== date("Y-m-d")) {
    $arBase['comment_count'] = Database::count('comment',"teacher_id = '".$arResult['id']."'");
    $arBase['assess_count'] = Database::count('assess',"teacher_id = '".$arResult['id']."'");
    $arBase['ball'] = getBall('teacher',$arResult['id']);
    $arBase['date'] = date("Y-m-d");
}

Database::update('teacher',"id = '".$arResult['id']."'",$arBase);