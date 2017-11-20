<?php
/**
 *
 * @arParam массив праметров компонента
 * @arResult массив результата
 * @arItem массив отдельного элемента
 *
 */
?>
<?
    $character_last = null;
?>
<ul class="list__teacher core__underlines">
    <?foreach ($arResult as $arItem):?>
        <li>
        <?
            $character = mb_substr($arItem['name'], 0, 1);

            if($character !== $character_last) {
                $character_last = $character;
                ?>
                    <b><?=$character?></b>
                <?
            } ?>
        <a href="<?=$arItem['url']?>" title="<?=$arItem['name']?>"><span><?=$arItem['name']?></span></a>
    </li>
    <?endforeach;?>
</ul>
<? Application::component('pagination', '', '',
    [
        "all" => $arParam['all'],
        "count" => $arParam['count'],
        "pagination" => $arParam['pagination'],
    ]
)?>
