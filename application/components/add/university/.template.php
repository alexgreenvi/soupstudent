<?php
/**
 *
 * @arParam массив праметров компонента
 * @arResult массив результата
 * @arItem массив отдельного элемента
 *
 */
?>
<div class="content__form">
    <div class="content__form__title">
        <span>Форма добавления ВУЗа</span>
    </div>
    <div class="content__form__item">
        <div class="content__form__item__name">
            <span>Регион:</span>
        </div>
        <div class="content__form__item__input">
            <div class="core__form__select">
                <select name="select" class="core__form__select__control" data-js-form-control="region" data-js-form-control-type="select">
                    <?if($arParam['region_id'] == 0):?><option selected="selected" value="0">Выберите регион</option><?endif;?>
                    <?foreach ($arResultRegion as $arItem):?>
                        <option value="<?=$arItem['id']?>" <?if($arParam['region_id'] == $arItem['id']){echo 'selected="selected"';}?>><?=$arItem['name']?></option>
                    <?endforeach;?>
                </select>
            </div>
        </div>
    </div>
    <?
        if(isset($arParam['region_id'])):
    ?>
        <div class="content__form__item">
            <div class="content__form__item__name">
                <span>Город:</span>
            </div>
            <div class="content__form__item__input">
                <div class="core__form__select">
                    <select name="select" class="core__form__select__control" data-js-form-control="city" data-js-form-control-type="select">
                        <?if($arParam['city_id'] == 0):?><option selected="selected" value="0">Выберите регион</option><?endif;?>
                        <?foreach ($arResultCity as $arItem):?>
                            <option value="<?=$arItem['id']?>" <?if($arParam['city_id'] == $arItem['id']){echo 'selected="selected"';}?>><?=$arItem['name']?></option>
                        <?endforeach;?>
                    </select>
                </div>
            </div>
        </div>
    <?
        endif;
        if(isset($arParam['city_id'])):
    ?>

    <div class="content__form__item">
        <div class="content__form__item__name">
            <span>ФИО:</span>
        </div>
        <div class="content__form__item__input">
            <div class="core__form__input">
                <input class="core__form__input__control" placeholder="" data-js-form-control="name" value="<?=$arParam['name']?>">
            </div>
            <?if($arParam['log']):?>
                <div class="core__form__input__log core__links">
                    <?=$arParam['log']?>
                </div>
           <?else:?>
                <div class="core__form__input__log">
                    <?foreach ($arResultCity as $arItem):?>
                        <?=$arItem['name']?><br>
                    <?endforeach;?>
                </div>
            <?endif;?>
        </div>
        <div class="content__form__item__question"></div>
    </div>
    <div class="content__form__item">
        <div class="content__form__item__name"></div>
        <div class="content__form__item__input">
            <br>
            <a href="#" class="core__btn core__btn_success" data-js-form-control-type="button">Добавить</a>
        </div>
    </div>
    <?
        endif;
    ?>
</div>






