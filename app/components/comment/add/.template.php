<?php
/**
 *
 * @arParam массив праметров компонента
 * @arResult массив результата
 * @arItem массив отдельного элемента
 *
 */
?>
<div class="comment__add" data-js-comment-add="<?=$arParam['table']?>" data-js-comment-add-id="<?=$arParam['id']?>">
    <? /*
    <div class="comment__add__images">
        <a href="" title="">
            <img src="/assets/img/ava.jpg" alt="">
        </a>
    </div>
    */ ?>
    <div class="comment__add__main">
        <div class="comment__add__main__text">
            <textarea placeholder="Напиши что-то интересное!" data-js-comment-add-text ></textarea>
        </div>
        <div class="comment__add__main__license" data-js-core-resize="comment__add__main__license" data-js-core-resize-width="md">
            Отправляя рекомендацию, вы соглашаетесь с
            <a href="/terms/" title="" class="core__link">пользовательским соглашением</a>.
        </div>
        <div class="comment__add__main__button" >
            <a href="" title="" class="core__btn core__btn_success" data-js-comment-add-button >Добавить рекомендацию</a>
        </div>
    </div>
    <div data-js-core-resize-after="comment__add__main__license">
        <!-- Переносим сюда блок -->
    </div>
</div>
