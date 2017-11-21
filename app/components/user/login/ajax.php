<?php require_once($_SERVER['DOCUMENT_ROOT'].'/.maarve/.ajax.php');
    // Подключаем библиотеки
    $DataBase = new Database();
    $User = new User();
    // Код ------------------
    $status = false;
    $methods = $_POST['methods'];

    $email = strtolower($_POST['email']);
    $password = strtolower($_POST['password']);


    // Email
    if(check_email($email)){
        if(!Database::select("one", "user","email","email = '".$email."'",'','')){
            $arJson['form']['email']['status'] = true;
        }else{
            $arJson['email']['status'] = false;
            $arJson['email']['error'] = 'Email уже занят';
        }
    }else{
        $arJson['form']['email']['status'] = false;
    }

    // Пароль
    if(strlen($_POST['password']) >= 6){
        $arJson['form']['password']['status'] = true;
    }else{
        $arJson['form']['password']['status'] = false;
    }


    if($methods == 'button') {
        if(!$User::login($_POST['email'],$_POST['password'])){
            $arJson['form']['password']['status'] = false;
            $arJson['form']['password']['error'] = 'Вы ввели неверный e-mail или пароль';
        }
    }

    foreach ($arJson['form'] as $item){
        if($item['status'] == false) {
            $status = false; break;
        } else {
            $status = true;
        }
    }

    if($status == true) {$arJson['status'] = $status;}
    // Конец ----------------
    // Возвращаем данные
    echo json_encode($arJson);
