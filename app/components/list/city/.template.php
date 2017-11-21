<?php
/**
 *
 * @arParam массив праметров компонента
 * @arResult массив результата
 * @arItem массив отдельного элемента
 *
 */
?>
<div class="city__list">
    <?foreach ($arResult as $arItem):?>
        <div class="city__list__item">
            <a href="<?=$arItem['url']?>" title="<?=$arItem['name']?>"><?=$arItem['name']?></a>
        </div>
    <?endforeach;?>
</div>
