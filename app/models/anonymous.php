<?php
class Anonymous {
    const COOKIE_TIME = 86400 * 31; //1 День

    // Получить ключ
    public static function get_id()
    {
        // Если есть куки
        if(isset($_COOKIE['anonymous_id']))
            return $_COOKIE['anonymous_id'];
        // Если нет куки
        $code = static::generate();
        $arBase['code'] = $code;
        $arBase['date']   = date("Y-m-d H:i:s");
        Database::insert('anonymous',$arBase);
        $id = Database::insert_id();
        setcookie('anonymous_id', $id, time() + static::COOKIE_TIME, '/', $_SERVER['SERVER_NAME']);
        setcookie('anonymous_code', $code, time() + static::COOKIE_TIME, '/', $_SERVER['SERVER_NAME']);
        return $id;
    }
    // Генерируем ключ
    public static function generate(){
        return mt_rand(100,99999) . uniqid(mt_rand(100,99999), true) . mt_rand(100,99999);
    }
}