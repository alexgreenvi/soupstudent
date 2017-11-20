<?php
class Route
{
    static function start()
    {
        // контроллер и действие по умолчанию
        $controller_url  = $_SERVER['DOCUMENT_ROOT'];
        $controller_name = 'index';

        $url = explode('/', $_SERVER['REQUEST_URI']);


        for($i = 0; $i <= count($url) - 1; $i++) {
            // ELEMENT CODE
            if($i == count($url) - 1) {
                if(!empty($url[$i]) OR $url[$i] == '0') {
                    $controller_name = 'detail';
                }

                // Константа
                if(!isset($_GET['page'])) {
                    $_GET['page'] = 1;
                }
                define('_APPLICATION' , array(
                    'CONTROLLER' => $controller_name,
                    'ELEMENT_CODE' => $url[$i],
                    'PAGE' => $_GET['page'] - 1
                ));
                // Конец

                break;
            }
            //Переменные

            // Определяем нужный контроллер
            if ( !empty($url[$i]) ){
                // Ищем папку
                if(file_exists($controller_url.'/'.$url[$i].'/')) {
                    $controller_url.= '/'.$url[$i];

                // Если он не найден и он был первым то пойдет ошибка
                // Родитель всегда должен тыть
                }else if ($i == 1){
                    Route::ErrorPage404();
                }
            }
        }
        // Запуска контроллера
        if(
            file_exists($controller_url.'/'.$controller_name.'.boot.php') OR
            file_exists($controller_url.'/'.$controller_name.'.php')
        ) {
            // Прописываем станд. перемен
            session_start();
            date_default_timezone_set("Europe/Moscow");
            header('Content-Type: text/html; charset=utf-8');

            if(file_exists($controller_url.'/'.$controller_name.'.boot.php')){
                include $controller_url.'/'.$controller_name.'.boot.php';

                // Если пустой массив выборки
                if($controller_name == 'detail' AND empty($arResult)) {
                    Route::ErrorPage404();
                }
            }
            include $controller_url.'/'.$controller_name.'.php';
        } else {
            Route::ErrorPage404();
        }
    }
    static function ErrorPage404()
    {
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
        header('Location:'.$host.'404');
    }
    static  function Redirect($url) {
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header("HTTP/1.1 301 Moved Permanently");
        header('Location:'.$host.$url);
    }
}