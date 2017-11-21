<?php
/**
 *
 * @arParam массив праметров компонента
 * @arResult массив результата
 * @arItem массив отдельного элемента
 *
 */
?>
<div class="_form-edit">
    <form action="/user/" method="post" data-ajax="/local/components/user/registration/ajax.php" class="_form-ajax" enctype="multipart/form-data">
        <div class="block">
            <div class="field">
                <div class="name"><span>E-mail:</span></div>
                <div class="input">
                    <input type="text" name="email" data-maarv="form" data-type="text"  data-field=" - ваш email" placeholder="yourname@example.com" autocomplete="off">
                </div>
            </div>
            <a href="#" class="quest"></a>
        </div>
        <div class="block">
            <div class="field">
                <div class="name"><span>Логин:</span></div>
                <div class="input">
                    <input type="text" name="login" data-maarv="form" data-type="text" data-field=" - ваш логин" placeholder="username" autocomplete="off">
                </div>
            </div>
            <a href="#" class="quest"></a>
        </div>
        <div class="block">
            <div class="field">
                <div class="name"><span>Пароль:</span></div>
                <div class="input">
                    <input type="text" name="password" placeholder="******" autocomplete="off">
                </div>
            </div>
            <a href="#" class="quest"></a>
        </div>
        <br>
        <?if(_APPLICATION['ELEMENT_CODE'] == 'student'):?>
        <!-- Студент -->
        <div class="block">
            <div class="field">
                <div class="name"><span>Аватарка:</span></div>
                <div class="input -file">
                    <input type="file"  name="avatar" size="0" accept="image/jpeg,image/png">
                </div>
            </div>
            <div class="description">Загрузите свою фотографию.</div>
            <a href="#" class="quest"></a>
        </div>
        <div class="block">
            <div class="field">
                <div class="name"><span>Имя или псевдоним:</span></div>
                <div class="input">
                    <input type="text" name="name" data-maarv="form" data-type="text" data-field="" placeholder="Введите ваш Email" autocomplete="off">
                </div>
            </div>
            <div class="description">Укажите свое настоящию Фамилию Имя и Отчество:</div>
            <a href="#" class="quest"></a>
        </div>
        <?elseif(_APPLICATION['ELEMENT_CODE'] == 'teacher'):?>
        <!-- Преподаватель -->
        <div class="block">
            <div class="field">
                <div class="name"><span>Ф.И.О :</span></div>
                <div class="input">
                    <input type="text" name="name" data-maarv="form" data-type="text" data-field="" placeholder="Введите ваш Email" autocomplete="off">
                </div>
            </div>
            <div class="description">Укажите свое настоящию Фамилию Имя и Отчество:</div>
            <a href="#" class="quest"></a>
        </div>
        <div class="block">
            <div class="field">
                <div class="name"><span>Документ:</span></div>
                <div class="input -file">
                    <input type="file"  name="document" size="0" accept="image/jpeg,image/png">
                </div>
            </div>
            <div class="description">Любой документ удостоверяющий личность</div>
            <a href="#" class="quest"></a>
        </div>
        <?endif;?>
        <div class="block">
            <button class="_button -big" type="submit">Зарегистрироватся</button>
        </div>
    </form>
</div>

