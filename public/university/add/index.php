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
                <? Application::component('add', 'university', '', [])?>
            </main>
        </div>
    </div>
<? Application::template('','footer','');?>