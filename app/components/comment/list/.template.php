<?php
/**
 *
 * @arParam массив праметров компонента
 * @arResult массив результата
 * @arItem массив отдельного элемента
 *
 */
?>

<div class="comment__list" data-js-comment-list >
    <?foreach ($arResult as $arItem):?>
        <div class="comment__list__item" data-js-comment-list-item>
            <? /*
            <div class="comment__list__item__images">
                <a href="" title="">
                    <img src="/assets/img/ava.jpg" alt="">
                </a>
            </div>
                */ ?>
            <div class="comment__list__item__main">
                <div class="comment__list__item__date"><?=getDateTime($arItem['date'],'')?></div>
                <div class="comment__list__item__user"><b><?=$arItem['anonymous']['name']?></b></div>
                <div class="comment__list__item__text">
                    <p><?=$arItem['text']?></p>
                </div>
            </div>

        </div>
    <?endforeach;?>
</div>
<? Application::component('pagination', '', '',
    [
        "all" => $arParam['all'],
        "count" => $arParam['count']
    ]
)?>
