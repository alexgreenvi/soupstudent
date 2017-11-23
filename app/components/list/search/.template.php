<?php
/**
 *
 * @arParam массив праметров компонента
 * @arResult массив результата
 * @arItem массив отдельного элемента
 *
 */
?>
<div class="list__search">
    <?if(!empty($arResult)):?>
        <?foreach ($arResult as $arItem):?>
            <a class="list__search__item" href="<?=$arItem['url']?>" title="<?=$arItem['name']?>" onclick="yaCounterXXXXXX.reachGoal('search_teacher_click'); return true;">
                <span class="list__search__item__name"><?=$arItem['name_search']?></span>
                <span class="list__search__item__inf"><?=$arItem['university']['name']?> / <?=$arItem['city']['name']?></span>
            </a>
        <?endforeach;?>
    <?else:?>
        <div class="list__text">
            По данному запросу ничего не найденно.
        </div>
    <?endif;?>
</div>
