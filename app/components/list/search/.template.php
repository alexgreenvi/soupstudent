<?php
/**
 *
 * @arParam массив праметров компонента
 * @arResult массив результата
 * @arItem массив отдельного элемента
 *
 */
?>
<div class="list list_mini">
    <?if(!empty($arResult)):?>
        <?foreach ($arResult as $arItem):?>
            <div class="list__item">
                <div class="row">
                    <div class="col-24">
                        <div class="list__item__main">
                            <div class="list__item__main__images">
                                <a href="<?=$arItem['url']?>" title="<?=$arItem['name']?>"></a>
                                <img src="/upload/<?=$arParam['table']?>/images/id/<?=$arItem['id']?>.jpg" alt="<?=$arItem['name']?>">
                            </div>
                            <div class="list__item__main__name core__underline">
                                <a href="<?=$arItem['url']?>" title="<?=$arItem['name_transcript']?>"><?=$arItem['name']?></a> /
                                <a href="<?=$arItem['last_url']?>" title="<?=$arItem['last_name']?>"><?=$arItem['last_name']?></a>
                            </div>
                            <div class="list__item__main__assets list__item__main__assets_right"><b><?=$arItem['ball']?></b> <span>балл.</span></div>
                            <div class="list__item__main__description">
                                <p><?=$arItem['university']['name_transcript']?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?endforeach;?>
    <?else:?>
        <div class="list__text">
            Ничего не найдено
        </div>
    <?endif;?>
</div>
