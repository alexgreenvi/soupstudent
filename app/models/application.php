<?php
class Application {
    public static function component($component,$name,$template,$arParam){
        $url = $_SERVER['DOCUMENT_ROOT'].'/app/components/';
        if(!empty($component)) $url .= $component.'/';
        if(!empty($name)) $url .= $name.'/'; else $url .= '.default/';

        if (empty($template)) $template = '.template';

        // boot
        if(file_exists($url.'.boot.php')){
            include ($url.'.boot.php');
        }
        elseif(file_exists($_SERVER['DOCUMENT_ROOT'].'/app/components/'.$component.'/.default/.boot.php')){
            include ($_SERVER['DOCUMENT_ROOT'].'/app/components/'.$component.'/.default/.boot.php');
        };

        // template
        if(file_exists($url.$template.'.php')) include ($url.$template.'.php');
    }
    public static function template($name,$template,$arParam){
        $url = $_SERVER['DOCUMENT_ROOT'].'/app/templates/';
        if(!empty($name)) $url .= $name;
        $url .= '/'.$template;

        if(file_exists($url.'.php')) include ($url.'.php');
    }
}

function drop($array){
    echo '<pre>';
    var_dump($array);
    echo '</pre>';
}
function getFile($url){
    if(file_exists($_SERVER['DOCUMENT_ROOT'].$url)){
        return true;
    }
    return false;
}
function getTextInBase($text){
    $text = strip_tags($text); // Удаляем все html теги и Php
    $text = nl2br($text); // Ставим Enter в троки
    //Вставляем ссылки
    $data = preg_replace("/(^|[\n ])([\w]*?)((ht|f)tp(s)?:\/\/[\w]+[^ \,\"\n\r\t<]*)/is", "$1$2<a target=\"_blank\" href=\"$3\" >$3</a>", $data);
    $data = preg_replace("/(^|[\n ])([\w]*?)((www|ftp)\.[^ \,\"\t\n\r<]*)/is", "$1$2<a target=\"_blank\" href=\"http://$3\" >$3</a>", $data);
    $data = preg_replace("/(^|[\n ])([a-z0-9&\-_\.]+?)@([\w\-]+\.([\w\-\.]+)+)/i", "$1<a target=\"_blank\" href=\"mailto:$2@$3\">$2@$3</a>", $data);
    //------
    return($text);
}
function getDateTime($date,$type){
    $month[1] = 'января';
    $month[2] = "февраля";
    $month[3] = "марта";
    $month[4] = "апреля";
    $month[5] = "мая";
    $month[6] = "июня";
    $month[7] = "июля";
    $month[8] = "августа";
    $month[9] = "сентября";
    $month[10] = "октября";
    $month[11] = "ноября";
    $month[12] = "декабра";

    $date_number = mb_substr($date, 8, -9);
    $date_month =  (int) mb_substr($date, 5, -12);
    $date_year = mb_substr($date, 0, -15);
    $date_time = "в ".mb_substr($date, 11, -3);

    if($type == ''){
        if ($date_number == date('d') AND $date_month == date('m') AND $date_year == date('Y')) {
            $date_number = "Сегодня";
            $date_month = "";
            $date_year = "";
        }
        if ($date_number + 1 == date('d') AND $date_month == date('m') AND $date_year == date('Y')) {
            $date_number = "Вчера";
            $date_month = "";
            $date_year = "";
        }

        $date = "".$date_number." ".$month[$date_month]." ".$date_year." ".$date_time;
        return $date;
    }
    if($type == 'day-month'){
        if ($date_number == date('d') AND $date_month == date('m') AND $date_year == date('Y')) {
            $date_number = "Сегодня";
            $date_month = "";
            $date_year = "";
        }
        if ($date_number + 1 == date('d') AND $date_month == date('m') AND $date_year == date('Y')) {
            $date_number = "Вчера";
            $date_month = "";
            $date_year = "";
        }

        $date = "".ltrim($date_number, '0')." ".$month[$date_month];
        return $date;
    }
    if($type == 'day-month-year'){
        if ($date_number == date('d') AND $date_month == date('m') AND $date_year == date('Y')) {
            $date_number = "Сегодня";
            $date_month = "";
            $date_year = "";
        }
        if ($date_number + 1 == date('d') AND $date_month == date('m') AND $date_year == date('Y')) {
            $date_number = "Вчера";
            $date_month = "";
            $date_year = "";
        }

        $date = "".ltrim($date_number, '0')." ".$month[$date_month]." ".$date_year;
        return $date;
    }
}