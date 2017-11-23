<? Application::template('','header',
    [
        'title' => 'Рейтинг ВУЗов 🏆 и преподавателей России на 2017 год — «Суп студента». Все институты и университеты РФ',
        'description' => '⭐ Выберите лучший ВУЗ по рейтингу сервиса «Суп студента»  Рейтинг институтов составлялся по отзывам студентов и оценки о преподавателях России',
        'keywords' => 'рейтинг, преподаватели, высшие учебные заведения, ВУЗы, Россия, оценки, отзывы, комментария, регионы, институты'
    ]
);?>
    <div class="container-fluid index__quote">
        <div class="container">
            <div class="index__quote__block" data-theme="soupstudent.com">
                <div class="index__quote__text"><span>Правильное образование - это самая важная вещь, чтобы у нашей страны было действительно достойное будущее.</span></div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="container">
            <?Application::template('','aside','');?>
            <main class="container-main indent-none">
                <div class="content">
                    <div class="content__main">
                        <div class="core__tabs" data-js-core-tabs="content">
                            <div class="core__tabs__item active" data-js-core-tabs-id="1">
                                <br>
                                <div class="content__header__title core__color_danger"><span>1. Выберите регион в котором Вы учитесь</span></div>
                                <div class="index__description">
                                    <p>Высказать свое мнение о преподавателе и оценить его работу Вам поможет наш сайт.</p>
                                    <p>Каждый посетитель может добавить преподавателя, оставить отзыв или рекомендацию и выставить оценки преподавателю по нескольким факторам.</p>
                                </div>
                                <div class="content__header__description core__links" data-js-core-resize="content__header__description" data-js-core-resize-width="sm">
                                </div>
                                <br>
                                <? Application::component('list', 'region', '',
                                    [
                                        "table" => 'region',
                                        "where" => 'country_id = "1"',
                                        'order' => 'name',
                                        'pagination' => false,
                                        "count" => 1000
                                    ]
                                )?>
                                <br>
                                <div class="index__info__text">
                                    <h1>Крупнейший проект рейтинга преподавателей Росиии</h1>
                                    <p>Вы можете посмотреть показатели качества обучения, стоимость обучения  , требовательность преподавателей, отношение к студентам, посещаемость занятий Оценки и отзывы о преподавателях и все высшие учебные заведения РФ.</p>
                                    <h2>Рейтинг преподавателей на Суп студента?</h2>
                                    <p>На Суп студента посетители добавляют преподавателей. Для каждого преподавателя создается страничка, где можно узнать рейтинг преподавателя, почитать отзывы, есть форма для добавления отзыва и форма для оценки. Любой посетитель сайта может добавить отзыв о преподавателе и выставить ему оценку. Комментарии и оценки добавляются анонимно и, администрация сайта не разглашает данные об авторах комментариев и оценок. Преподавателя можно оценить по нескольким факторам, главный из них «Общая оценка». Оценка может быть от — 1 до 5, оценки выставленные посетителями суммируются и у кого будет больше сумма оценок, тот преподаватель и будет выше в рейтинге.</p>
                                    <h2>Где посмотреть рейтинг преподавателя?</h2>
                                    <p>Позицию преподавателя в рейтинге можно посмотреть в таблице «TOP преподавателей».</p>
                                    <p>Отзывы о преподавателе можно увидеть на странице преподавателя, для этого нужно найти преподавателя поиском (искать по Ф.И.О).</p>
                                    <h2>Как посмотреть рейтинг преподавателей моего ВУЗа?</h2>
                                    <p>С помощью навигатора выбрать регион, где находится ВУЗ, потом загрузиться список вузов, а потом выбрать ВУЗ, если вашего вуза нет в списке, напиши нам и мы обязательно его добавим. Можете воспользоваться поисков ВУЗов.</p>
                                    <h2>Что делать если преподавателя нет в рейтинге?</h2>
                                    <p>Добавить преподавателя :)</p>
                                    <h2>О проекте</h2>
                                    <p>В 2015г. мы основали сайт и уже на сегодняшний день он является самым крупным проектом рейтинга преподавателей в России. Каждый день люди оставляют сотни оценок и отзывов преподавателям своих ВУЗов. Мы постоянно совершенствуем алгоритмы оценивания и поиска преподавателей, а также удобство работы с сайтом.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?Application::template('','aside__content','');?>
                </div>
            </main>
        </div>
    </div>
<? Application::template('','footer','');?>