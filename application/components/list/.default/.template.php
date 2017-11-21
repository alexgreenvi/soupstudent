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
            <div class="list__item__main">
                    <div class="list__item__main__images">
                        <?if(getFile("/upload/$arParam[table]/images/id/$arItem[id].jpg")):?>
                            <a href="<?=$arItem['url']?>" title="<?=$arItem['name']?>">
                                <img alt="<?=$arResult['name']?>" src="/upload/<?=$arParam['table']?>/images/id/<?=$arItem['id']?>.jpg">
                            </a>
                        <?else:?>
                            <span></span>
                        <?endif;?>
                    </div>
                    <div class="list__item__main__name">
                        <a href="<?=$arItem['url']?>" title="<?=$arItem['name_transcript']?>"><?=$arItem['name']?></a>
                    </div>
                    <div class="list__item__main__description">
                        <p><?=$arItem['name_transcript']?></p>
                    </div>
                </div>
            </div>

           
            <?/*
             <a href="<?=$arItem['last_url']?>" title="<?=$arItem['last_name']?>"><?=$arItem['last_name']?></a>
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
            */?>
    
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
