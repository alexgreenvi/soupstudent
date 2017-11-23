<?php
/**
 *
 * @arParam массив праметров компонента
 * @arResult массив результата
 * @arItem массив отдельного элемента
 *
 */
?>
<div class="rating__add">
    <div class="rating__add__wrap">
        <?foreach ($arResult as $arItem):?>
            <div class="rating__add__item">
            <div class="rating__add__item__name"><span><?=$arItem['title']?></span></div>
            <div class="rating__add__item__stars" data-js-assess="<?=$arParam['table']?>" data-js-assess-id="<?=$arParam['id']?>" data-js-assess-value-id="<?=$arItem['id']?>">
                <?for($i = 1; $i<= 5; $i++):?>
                <?
                    $active = null;
                    if($arItem['number'] >= $i AND $arItem['number'] != 0) {
                        $active = 'active';
                    }
                    if($arItem['my_number'] == $i) {
                        $active .= ' my';
                    }
                ?>
                <div class="rating__add__item__star <?=$active?>" data-js-assess-value-number="<?=$i?>" onclick="yaCounterXXXXXX.reachGoal('assets_add'); return true;">
                    <svg class="rating__add__item__star__icon core__svg" xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 26 26">
                        <path d="M25.326,10.137c-0.117-0.361-0.431-0.625-0.807-0.68l-7.34-1.066l-3.283-6.651 c-0.337-0.683-1.456-0.683-1.793,0L8.82,8.391L1.48,9.457c-0.376,0.055-0.689,0.318-0.807,0.68c-0.117,0.363-0.02,0.76,0.253,1.025 l5.312,5.178l-1.254,7.31c-0.064,0.375,0.09,0.755,0.397,0.978c0.309,0.225,0.717,0.254,1.054,0.076L13,21.252l6.564,3.451 c0.146,0.077,0.307,0.115,0.466,0.115c0.207,0,0.413-0.064,0.588-0.191c0.308-0.223,0.462-0.603,0.397-0.978l-1.254-7.31 l5.312-5.178C25.346,10.896,25.443,10.5,25.326,10.137z"></path>
                    </svg>
                    <span class="rating__add__item__star__number"><?=$i?></span>
                </div>
                <?endfor;?>
            </div>
            <div class="rating__add__item__count">
                <div class="rating__add__item__count__number"><?=$arItem['number']?></div>
                <div class="rating__add__item__count__description"><?=$arItem['count']?> человек</div>
            </div>
            <div class="rating__add__item__description"><p><?=$arItem['desc']?></p></div>
        </div>
        <?endforeach;?>
    </div>
</div>






