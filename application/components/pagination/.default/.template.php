<div class="pagination">
    <ul>
        <?if($arResult):?>
            <?foreach ($arResult as $arItem):?>
                <?if($arItem['active'] == true):?>
                    <li class="active"><span><?=$arItem['number'];?></span> </li>
                <?else:?>
                    <li><a href="<?=$arItem['url'];?>"><?=$arItem['number'];?></a></li>
                <?endif;?>
            <?endforeach;?>
        <?endif;?>
    </ul>
</div>