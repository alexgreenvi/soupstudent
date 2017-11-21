<? Application::template('','header',
    [
        'title' => 'FAQ - ответы на часто задаваемые вопросы',
        'description' => 'Ответы на часто задаваемые вопросы (FAQ)',
    ]
);?>
    <div class="container-fluid">
        <div class="container">
            <? Application::template('','aside','');?>
            <main class="container-main indent-none">
                <? Application::component('breadcrumbs', '', '',
                    [
                          'Поддержка проекта' => ''
                    ]
                )?>
                <div class="content">
                    <div class="content__main">
                        <div class="core__tabs" data-js-core-tabs="content">
                            <div class="core__tabs__item active" data-js-core-tabs-id="1">
                                <div class="content__text">
                                    <h1>Ответы на часто задаваемые вопросы</h1>
                                    <h2>Какие комментарии и оценки запрещены на сайте?</h2>
                                    <p>На сайте запрещены оскорбления, нецензурная речь, угрозы, клевета и пр. в отношении любых участников (подробнее в разделе <a href="/terms/" title="Пользовательское соглашение">«Пользовательское соглашение»</a>).</p>
                                    <p>Также на сайте запрещена публикация заведомо ложных оценок и отзывов, не имеющих ничего общего с действительностью.</p>
                                    <h2>На сайте нет вуза, в котором я учусь, и нет моих преподавателей. Можно ли их добавить на сайт?</h2>
                                    <p>Если Вы не нашли на сайте Вашего вуза или преподавателей, напишите нам на почту <a href="mailto:support@soupstudent.com" title="Написать">support@soupstudent.com</a>. Мы примем все меры, чтобы как можно скорее Ваш вуз был добавлен на сайт.</p>
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