<?Application::template('','header',
    [
        'title' => "Учебные заведения и Вузы $arResult[name_declension]. Колледжи и техникумы, список ВУЗов, ПТУ и лицеев",
        'description' => "Рейтинг вузов $arResult[name_declension], университеты, академии, институты, колледжи, техникумы, училища и ПТУ. Адреса, телефоны, официальные сайты.",
        'keywords' => "рейтинг, преподаватели, высшие учебные заведения, колледжи, университет, $arResult[name], оценки, отзывы, комментария, регионы, институты"
    ]
);?>
<div class="container-fluid">
    <div class="container">
        <?Application::template('','aside','');?>
        <main class="container-main indent-none">
            <? Application::component('breadcrumbs', '', '',
                [
                    $arResult['name'] => ''
                ]
            )?>
            <div class="content__header">
                <div class="content__header__images">
                    <img src="/upload/region/images/id/<?=$arResult['id']?>.jpg" alt="<?=$arResult['name']?>?>">
                </div>
                <div class="content__header__control" data-js-core-resize="content__header__control" data-js-core-resize-width="xl">
                    <a href="/teacher/add/" title="Добавить преподавателя" class="core__btn core__btn_success"><span>Добавить преподавателя</span></a>
                </div>
                <div class="content__header__title"><h1>ВУЗы <?=$arResult['name_declension']?></h1><b> - </b><span><?=$arResult['ball']?> балл.</span></div>
                <div class="core__count content__header__count" data-js-core-resize="content__header__count" data-js-core-resize-width="xl">
                    <div class="core__count__item">
                        <div class="core__count__item__number"><b><?=$arResult['university_count']?></b></div>
                        <div class="core__count__item__description">Институтов</div>
                    </div>
                </div>
                <div class="content__header__description core__links" data-js-core-resize="content__header__description" data-js-core-resize-width="sm">
                    <p>Список всех институтов <?=$arResult['name_declension']?> и городов, в котором вы сможете найти институт по рейтингу и узнать сайт, адрес и телефон данного ВУЗа.</p>
                </div>
            </div>
            <div data-js-core-resize-after="content__header__description">
                <!-- Переносим сюда блок -->
            </div>
            <div class="row">
                <div class="col-8 col-md-12 col-sm-24" data-js-core-resize-after="content__header__count">
                    <!-- Переносим сюда блок -->
                </div>
                <div class="col-8 col-md-12 col-sm-24" data-js-core-resize-after="content__header__control">
                    <!-- Переносим сюда блок -->
                </div>
                <div class="col-8 col-md-24 content__nav__social__link_mobile" data-js-core-resize-after="content__nav__social__link">
                    <!-- Переносим сюда блок -->
                </div>
            </div>
            <div class="content__nav" >
                <nav class="core__links">
                    <ul class="core__tabs__nav" data-js-core-tabs-nav="content">
                        <li><a href="#" title="" data-js-core-tabs-nav-id="1" class="active">Институты и города</a></li>
                    </ul>
                </nav>
                <div class="ya-share2 content__nav__social__link"  data-js-core-resize="content__nav__social__link" data-js-core-resize-width="xl"  data-services="collections,vkontakte,facebook,odnoklassniki,moimir,gplus" data-counter=""></div>
            </div>
            <div class="content">
                <div class="content__main">
                    <div class="core__tabs" data-js-core-tabs="content">
                        <div class="core__tabs__item active" data-js-core-tabs-id="1">
                            <br>
                            <? Application::component('list', 'city', '',
                                [
                                    "table" => "city",
                                    "where" => "region_id = '"._APPLICATION['ELEMENT_CODE']."'",
                                ]
                            )?>
                            <div class="content__title">
                                <span>Учебные заведения</span>
                            </div>
                            <? Application::component('list', '', '',
                                [
                                    "table" => "university",
                                    "param" => "",
                                    "where" => "region_id = '"._APPLICATION['ELEMENT_CODE']."'",
                                    "order" => 'ball DESC',
                                    "count" => "20",
                                    "pagination" => true
                                ]
                            )?>
                        </div>
                    </div>
                </div>
                <?Application::template('','aside__content','');?>
            </div>
        </main>
    </div>
</div>
<?Application::template('','footer','');?>