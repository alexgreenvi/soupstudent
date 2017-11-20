<?php
/**
 *
 * @arParam массив праметров компонента
 * @arResult массив результата
 * @arItem массив отдельного элемента
 */
//if(!empty($_POST)){
//    // Подключаем библиотеки
//    $DataBase = new Database();
//    $Images = new Images();
//
//    $login = strtolower($_POST['login']);
//    $name = strtolower($_POST['name']);
//    $email = strtolower($_POST['email']);
//    $password = sha1(md5(strtolower($_POST['password'])));
//    $date = date("Y-m-d H:i:s");
//
//
//    $arBase['login'] = $login;
//    $arBase['name'] = $name;
//    $arBase['email'] = $email;
//    $arBase['password'] = $password;
//    $arBase['date'] = $date;
//
//    var_dump($_FILES);
//
//    Database::insert("user", $arBase);
//    $id = Database::insert_id();
//
////    if (!empty($_FILES['file']['tmp_name'])){
////
////        //$url = $_FILES['file']['tmp_name'];
////
////        Images::load($_FILES['file']['tmp_name']);
////        Images::save($_SERVER['DOCUMENT_ROOT'].'/'.$id.'.jpg');
////        Images::resizeToWH(80,80);
////        Images::save($_SERVER['DOCUMENT_ROOT'].'/'.$id.'.jpg');
////    }
//
//    if (!empty($_FILES['avatar']['tmp_name'])) {
//        $images = $_FILES['avatar']['tmp_name'];
//
//        Images::load($images);
//        Images::save('source/user/avatar/'.$id.'.jpg');
//    }
//}