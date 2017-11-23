<?php
class Database
{
    private static $mysqli = null;
    private static $server = ENGINE_DB_HOST;
    private static $user = ENGINE_DB_USER;
    private static $password = ENGINE_DB_PASSWORD;
    private static $DBName = ENGINE_DB_NAME;

    public static function connect(){
        if (!is_object(static::$mysqli) || !static::$mysqli instanceof mysqli) {
            static::$mysqli = @new mysqli(static::$server, static::$user, static::$password, static::$DBName);
            static::$mysqli -> query( "SET CHARSET utf8" );

            if (static::$mysqli->connect_error) {
                echo "Не удалось подключиться к MySQL: (" . static::$mysqli->connect_errno . ") " . static::$mysqli->connect_error;
            }
        }
    }
    public static function close(){
        if (is_object(static::$mysqli) && static::$mysqli instanceof mysqli) {
            @static::$mysqli->close();
        }
    }

    private static function getArray($number,$result){
        if($result->{'num_rows'} >= '2' OR $number == 'all'){
            $arResult = array();
            $count = 0 ;
            while ($row = getData(mysqli_fetch_assoc($result))) {
                $arResult[$count] = $row;
                $count++;
            }
        }elseif ($number == 'one'){
            $arResult = getData(mysqli_fetch_assoc($result));
        }else{
            echo 'Не заданно количетво: "one" - однин, "all" - все.';
        }

        return $arResult;
    }
    private static function SQL($table,$param='*',$where,$limit,$order) {
        $CODE = 'SELECT ';

        if(is_array($param) AND !empty($param[0])){
            foreach($param as $key => $value) {
                $CODE.= $value.', ';
            }
            $CODE = rtrim($CODE,', ');
        }else{
            $CODE .= '*';
        }
        $CODE .= ' FROM '.$table;
        if (!empty($where)){ $CODE .= ' WHERE '.$where; }
        if (!empty($order)){
            $CODE .= ' ORDER BY '.$order;
        } else {
            $CODE .= ' ORDER BY id DESC';
        }
        if (is_array($limit)){
            if ($limit[0] >= 0 AND $limit[1] != 0){
                $CODE .= ' LIMIT '.$limit[0].','.$limit[1];
            }
        }
        return $CODE;
    }

    public static function select($number,$table,$param,$where,$limit,$order) {
        $CODE = static::SQL($table,$param,$where,$limit,$order);

        $result   = static::$mysqli->query("$CODE");
        $arResult = static::getArray($number,$result);

        return $arResult;
    }
    public static function count($table,$where) {
        $CODE = static::SQL($table,['id'],$where,'','');

        $result = static::$mysqli->query("$CODE");
        $res_array = mysqli_num_rows($result);
        return $res_array;
    }
    public static function check($table,$where) {
        $CODE = static::SQL($table,$param='id',$where,'0,1','');

        $result = static::$mysqli->query("$CODE");
        $arResult = static::getArray('one',$result);
        return $arResult['id'];
    }
    public static function insert($table, $param){
        $CODE = "INSERT INTO $table(";

        foreach ($param as $fields => $value) $CODE.= "$fields,";

        $CODE = substr($CODE, 0, -1);

        $CODE .= ") VALUES (";
        foreach ($param as $value) $CODE.= "'".addslashes($value)."',";
        $CODE = substr($CODE, 0, -1);
        $CODE .= ")";

        return static::$mysqli->query("$CODE");
    }
    public static function insert_id(){
        return  mysqli_insert_id(static::$mysqli);
    }
    public static function update($table, $where, $param){
        $CODE = "UPDATE $table SET";

        if (is_array($param)){
            foreach($param as $key => $value) {
                $CODE.= "`$key` = '".$value."',";
            }
            $CODE = rtrim($CODE,', ');
        }

        if (!empty($where)){ $CODE .= ' WHERE '.$where; }

        return static::$mysqli->query("$CODE");
    }
    public static function delete($table, $where){
        $CODE = "DELETE FROM $table";

        if (!empty($where)){
            $CODE .= ' WHERE '.$where;
            return static::$mysqli->query("$CODE");
        }else{
            return false;
        }
    }
}
function getData($arResult){
    // Страна
    if(isset($arResult['country_id'])){
        $arTemp = Database::select('one','country', ['name'], "id = $arResult[country_id]", "", "");
        $arResult['country'] = $arTemp;
    }
    // Регион
    if(isset($arResult['region_id'])){
        $arTemp = Database::select('one','region', ['name'], "id = $arResult[region_id]", "", "");
        $arResult['region'] = $arTemp;
    }
    // Город
    if(isset($arResult['city_id'])){
        $arTemp = Database::select('one','city', ['name'], "id = $arResult[city_id]", "", "");
        $arResult['city'] = $arTemp;
    }
    // Институт
    if(isset($arResult['university_id'])){
        $arTemp = Database::select('one','university', ['name','name_transcript'], "id = $arResult[university_id]", "", "");
        $arResult['university'] = $arTemp;
    }
    return $arResult;
}
function getUrl($arResult,$table){
    $url = null;
    // Формируем URL
    if(isset($arResult['country_id'])){
        $url.= '/country/'.$arResult['country_id'];
    }
    if(isset($arResult['region_id'])){
        $url.= '/region/'.$arResult['region_id'];
    }
    if(isset($arResult['city_id'])){
        $url.= '/city/'.$arResult['city_id'];
    }
    if(isset($arResult['university_id'])){
        $url.= '/university/'.$arResult['university_id'];
    }

    $url.= '/'.$table;
    $url.= '/'.$arResult['id'];
    return $url;
}
function getBall($table,$id){
    $ball = null;
    $count = 0;
    $arResult = Database::select('all','assess',
        '', $table.'_id="'.$id.'"',
        '', '');


    foreach($arResult as $arItem){
        for($i=1;$i<=6;$i++) {
            if($arItem['value_'.$i] != 0){
                $ball += $arItem['value_'.$i];
                $count++ ;
            }
        }
    }

    if ($ball != 0) {
        $ball = round($ball / $count, 3);
    }else{
        $ball = 0;}

    return $ball;
}