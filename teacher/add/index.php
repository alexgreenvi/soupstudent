<? Application::template('','header',
    [
        'title' => "$arResult[name] - $arResult[name_transcript]. Общая информация, лучшие преподаватели, отзывы и факультеты.",
        'description' => $arResult['name']." - ".$arResult['name_transcript']." г.".$arResult['city']['name'].", кафедры, отзывы о преподавателях, контактные данные, адрес официального сайта, общая информация, телефоны, email, аккредитация и лицензия.",
        'keywords' => "рейтинг, преподаватели, учителя, процессоры, высшие учебные заведения, колледж, университет, Россия, оценки, отзывы, комментария, регионы, институты"
    ]
);?>
    <div class="container-fluid">
        <div class="container">
            <? Application::template('','aside','');?>
            <main class="container-main indent-none">
                <? Application::component('breadcrumbs', '', '',
                    [
                        'Добавления преподавателя' => ''
                    ]
                )?>
                <div class="content">
                    <div class="content__main">
                        <div class="core__tabs" data-js-core-tabs="content">
                            <br>
                            <div class="core__tabs__item active" data-js-core-tabs-id="1">
                                <? Application::component('add', 'teacher', '', [])?>
                            </div>
                        </div>
                    </div>
                    <? Application::template('','aside__content','');?>
                </div>
            </main>
        </div>
    </div>
<? Application::template('','footer','');?>