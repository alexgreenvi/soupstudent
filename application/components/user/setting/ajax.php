<?php require_once($_SERVER['DOCUMENT_ROOT'].'/.maarve/.ajax.php');
    // Подключаем библиотеки
    $DataBase = new Database();
    $User = new User();
    // Код ------------------
    $status = false;
    $methods = $_POST['methods'];

    $login = strtolower($_POST['login']);
    $name = strtolower($_POST['name']);
    $email = strtolower($_POST['email']);
    $password = sha1(md5(strtolower($_POST['password'])));


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
        $arJson['form']['email']['error'] = 'Введите корректный адрес';
    }

    // Логин
    if(check_login($login)){
        if(!Database::select("one", "user","login","login = '".$login."'",'','')){
            $arJson['form']['login']['status'] = true;
        }else{
            $arJson['form']['login']['status'] = false;
            $arJson['form']['login']['error'] = 'Логин уже занят';
        }
    }else{
        $arJson['form']['login']['status'] = false;
        $arJson['form']['login']['error'] = 'Только буквы (A-Z a-z) и цифры (0-9), не меньше 3 и не больше 25 символов';
    }

    // Пароль
    if(strlen($_POST['password']) >= 6){
        $arJson['form']['password']['status'] = true;
    }else{
        $arJson['form']['password']['status'] = false;
        $arJson['form']['password']['error'] = 'Длина пароля не может быть меньше 6 символов';
    }

    // Фото
    if(empty($_FILES['avatar']['tmp_name'])){
        $arJson['form']['avatar']['status'] = false;
        $arJson['form']['avatar']['error'] = 'Вы не выбрали фотографию';
    }

    // Имя
    if(strlen($name) >= 2){
        $arJson['form']['name']['status'] = true;
    }else{
        $arJson['form']['name']['status'] = false;
        $arJson['form']['name']['error'] = 'Длина имени не может быть меньше 2 символов';
    }


    foreach ($arJson['form'] as $item){
        if($item['status'] == false) {
            $status = false; break;
            } else {
            $status = true;
        }
    }


    if($status == true) {
        if($methods == 'button') {
            $arBase['login'] = $login;
            $arBase['name'] = $name;
            $arBase['email'] = $email;
            $arBase['password'] = $password;
            $arBase['date'] = date("Y-m-d H:i:s");

            Database::insert("user", $arBase);
            $id = Database::insert_id();

            if (!empty($_FILES['avatar']['tmp_name'])) {
                $images = $_FILES['avatar']['tmp_name'];

                Images::load($images);
                Images::resizeToWH(400,400);
                Images::save('source/user/avatar/'.$id.'.jpg');
            }

            if (!empty($_FILES['document']['tmp_name'])) {
                $images = $_FILES['document']['tmp_name'];

                Images::load($images);
                Images::save('source/user/document/'.$id.'.jpg');
            }

            User::login($email,$password);
        }

        $arJson['status'] = $status;
    }

    $arJson['POST'] = $_POST;

    // Конец ----------------
    // Возвращаем данные
    echo json_encode($arJson);
