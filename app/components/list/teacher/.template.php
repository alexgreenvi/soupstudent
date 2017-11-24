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
        <li itemprop="alumni" itemscope itemtype="http://schema.org/Person">
        <?
            $character = mb_substr($arItem['name'], 0, 1);

            if($character !== $character_last) {
                $character_last = $character;
                ?>
                    <b><?=$character?></b>
                <?
            } ?>
        <a href="<?=$arItem['url']?>" title="<?=$arItem['name']?>" itemprop="url">
            <span itemprop="name"><?=$arItem['name']?></span>
        </a>
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
