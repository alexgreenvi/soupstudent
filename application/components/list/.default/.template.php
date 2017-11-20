<?php
/**
 *
 * @arParam массив праметров компонента
 * @arResult массив результата
 * @arItem массив отдельного элемента
 *
 */
?>
<div class="list">
    <?foreach ($arResult as $arItem):?>
        <div class="list__item">
            <div class="row">
                <div class="col-17 col-xl-13 col-lg-24">
                    <div class="list__item__main">
                        <div class="list__item__main__images">
                            <a href="<?=$arItem['url']?>" title="<?=$arItem['name']?>"></a>
                            <?if(getFile("/upload/$arParam[table]/images/id/$arItem[id].jpg")):?>
                                <img alt="<?=$arResult['name']?>" src="/upload/<?=$arParam['table']?>/images/id/<?=$arItem['id']?>.jpg">
                            <?else:?>
                                <span></span>
                            <?endif;?>
                        </div>
                        <div class="list__item__main__name core__underline">
                            <a href="<?=$arItem['url']?>" title="<?=$arItem['name_transcript']?>"><?=$arItem['name']?></a> /
                            <a href="<?=$arItem['last_url']?>" title="<?=$arItem['last_name']?>"><?=$arItem['last_name']?></a>
                        </div>
                        <div class="list__item__main__description">
                            <p><?=$arItem['name_transcript']?></p>
                        </div>
                    </div>
                </div>

                <div class="col-7 col-xl-11 col-lg-24">
                    <div class="list__item__statistic">
<!--                        --><?// Application::component('assess', 'statistic', '',
//                            [
//                                "id"    => $arItem['id'],
//                                "where" => $arParam['table'].'_id ="'.$arItem['id'].'"'
//                            ]
//                        )?>
                        <div class="core__count core__count_small">
                            <?if(isset($arItem['teacher_count'])):?>
                            <div class="core__count__item">
                                <div class="core__count__item__number"><b><?=$arItem['teacher_count']?></b></div>
                                <div class="core__count__item__description">Преподавателей</div>
                            </div>
                            <?endif;?>
                            <?
                                $class = null;
                                if($arItem['ball'] > 0)  $class = 'core__color_success';
                            ?>
                            <div class="core__count__item">
                                <div class="core__count__item__number <?=$class?>"><b><?=$arItem['ball']?></b></div>
                                <div class="core__count__item__description">балл.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?endforeach;?>
    <?if(empty($arResult)):?>
        <div class="list__log core__links">Мы ничего не нашли.</div>
    <?endif;?>
</div>
<? Application::component('pagination', '', '',
    [
        "all" => $arParam['all'],
        "count" => $arParam['count']
    ]
)?>
