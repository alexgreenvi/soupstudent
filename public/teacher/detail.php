<? Application::template('','header',
    [
        'title' => "$arResult[name] 🎓 - ".$arResult['university']['name'],
        'description' => "$arResult[name] - отзывы о преподавателе, рейтинг (на основе $arResult[assess_count] отзывов): $arResult[ball], преподает в ".$arResult['university']['name']." г. ".$arResult['city']['name'],
        'keywords' => "оценки, отзывы, $arResult[name],".$arResult['university']['name']
    ]
);?>
    <div class="container-fluid">
        <div class="container">
            <? Application::template('','aside','');?>
            <main class="container-main indent-none">
                <? Application::component('breadcrumbs', '', '',
                    [
                        $arResult['region']['name'] => '/region/'.$arResult['region_id'],
                        $arResult['city']['name'] => '/city/'.$arResult['city_id'],
                        $arResult['university']['name'] => '/university/'.$arResult['university_id'],
                        $arResult['name'] => ''
                    ]
                )?>
                <div class="content__header">
                    <div class="content__header__images">
                        <span></span>
                    </div>
                    <div class="content__header__control" data-js-core-resize="content__header__control" data-js-core-resize-width="xl">
                        <a href="/faq/" title="FAQ" class="content__header__control__question core__btn-link">Ответы на вопросы</a>
                    </div>
                    <div class="content__header__title"><h1><?=$arResult['name']?></h1><b> - </b><span><?=$arResult['ball']?> балл.</span></div>
                    <div class="core__count content__header__count" data-js-core-resize="content__header__count" data-js-core-resize-width="xl">
                        <div class="core__count__item">
                            <div class="core__count__item__number"><b><?=$arResult['assess_count']?></b></div>
                            <div class="core__count__item__description">Оценок</div>
                        </div>
                        <div class="core__count__item">
                            <div class="core__count__item__number"><b><?=$arResult['comment_count']?></b></div>
                            <div class="core__count__item__description">Рекомендаций</div>
                        </div>
                    </div>
                    <div class="content__header__description core__links" data-js-core-resize="content__header__description" data-js-core-resize-width="sm">
                        <p><?=$arResult['name'].' преподает в <a href="/university/'.$arResult['university']['id'].'" title="'.$arResult['university']['name_transcript'].'">'.$arResult['university']['name'].'</a> города <a href="/city/'.$arResult['city']['id'].'" title="'.$arResult['city']['name'].'">'.$arResult['city']['name'].'</a><br>'.$arResult['text']?></p>
                    </div>
                </div>
                <div data-js-core-resize-after="content__header__description">
                    <!-- Переносим сюда блок -->
                </div>
                <div class="row">
                    <div class="col-9 col-md-12 col-sm-24" data-js-core-resize-after="content__header__count">
                        <!-- Переносим сюда блок -->
                    </div>
                    <div class="col-8 col-md-12 col-sm-24" data-js-core-resize-after="content__header__control">
                        <!-- Переносим сюда блок -->
                    </div>
                    <div class="col-7 col-md-24 content__nav__social__link_mobile" data-js-core-resize-after="content__nav__social__link">
                        <!-- Переносим сюда блок -->
                    </div>
                </div>
                <div class="content__nav" >
                    <nav class="core__links">
                        <ul class="core__tabs__nav" data-js-core-tabs-nav="content">
                            <li><a href="#" title="" data-js-core-tabs-nav-id="1" class="active">Институты</a></li>
                        </ul>
                    </nav>
                    <div class="ya-share2 content__nav__social__link"  data-js-core-resize="content__nav__social__link" data-js-core-resize-width="xl"  data-services="collections,vkontakte,facebook,odnoklassniki,moimir,gplus" data-counter=""></div>
                </div>
                <div class="content">
                    <div class="content__main">
                        <div class="core__tabs" data-js-core-tabs="content">
                            <div class="core__tabs__item active" data-js-core-tabs-id="1">
                                <?if(_APPLICATION['PAGE'] == 0):?>
                                    <div class="content__title">
                                        <span>Информация</span>
                                    </div>
                                    <div class="content__table core__links">
                                        <div class="content__table__tr">
                                            <div class="content__table__td">Город:</div>
                                            <div class="content__table__td"><a href="/city/<?=$arResult['city']['id']?>"><?=$arResult['city']['name']?></a></div>
                                        </div>
                                        <div class="content__table__tr">
                                            <div class="content__table__td">Адрес:</div>
                                            <div class="content__table__td"><a href="/university/<?=$arResult['university']['id']?>"><?=$arResult['university']['name']?></a></div>
                                        </div>
                                        <div class="content__table__tr">
                                            <div class="content__table__td">Рейтинг ВУЗов:</div>
                                            <div class="content__table__td">
                                                Место в общем рейтинге <a href="" title="">...</a> из ...<br>
                                                В своём городе  .. из ..
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <? Application::component('assess', 'add', '',
                                        [
                                            "table" => "teacher",
                                            "id" => _APPLICATION['ELEMENT_CODE'],
                                            "status" => $arResult['status']
                                        ]
                                    )?>
                                <?endif;?>
                                <div class="content__title">
                                    <span>Рекомендации</span>
                                </div>
                                <div class="content__description">
                                    <p>
                                        Напишите, чтобы Вы хотели изменить в методе преподавания, <?=$arResult['name']?>, это поможет улучшить практику преподавания.
                                    </p>
                                </div>
                                <div class="content__comment">
                                    <? Application::component('comment', 'add', '',
                                        [
                                            "table" => "teacher",
                                            "id" => _APPLICATION['ELEMENT_CODE'],
                                        ]
                                    )?>
                                    <? Application::component('comment', 'list', '',
                                        [
                                            "table" => "teacher",
                                            "id" => _APPLICATION['ELEMENT_CODE'],
                                            'count' => "10"
                                        ]
                                    )?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <? Application::template('','aside__content','');?>
                </div>
            </main>
        </div>
    </div>
<? Application::template('','footer','');?>