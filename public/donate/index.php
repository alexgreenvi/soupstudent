<? Application::template('','header',
    [
        'title' => 'Поддержать проект',
        'description' => 'Благодарим Вас за интерес к нашему проекту. Искренне надеемся на то, что наши материалы полезны для Вас. Если у Вас есть желание поддержать наш проект, есть несколько способов это сделать. Оставить свое мнение и впечатление о проекте. Для нас очень важно Ваше мнение о нашем проекте.',
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
                                    <h1>Поддержка проекта</h1>
                                    <p>Благодарим Вас за интерес к нашему проекту. Искренне надеемся на то, что наши материалы полезны для Вас.</p>
                                    <p>Если у Вас есть желание поддержать наш проект, есть несколько способов это сделать.</p>
                                        <span class="content__text__title">Оставить свое мнение и впечатление о проекте.</span>
                                    <p>Для нас очень важно Ваше мнение о нашем проекте. Расскажите, что именно вам нравится, что бы Вы еще хотели видеть у нас, какие темы нужно осветить подробнее.</p>
                                    <p><b>Вы можете писать нам на <a href="mailto:support@soupstudent.com" title="Отправить письмо soupstudent.com">e-mail</a> или в сообщения <a href="https://www.instagram.com/soupstudent/" title="Наш instagram" target="_blank">паблика</a>.</b></p>
                                    <p>Оставить ссылку на сайт «Cуп студента», #супстудента рассказать друзьям о группе в Вконтакте и Instagram.</p>
                                    <p>Вы можете оставить ссылки на наш сайт. Тогда больше людей узнают о проекте, и мы очень надеемся, что он принесет больше пользы другим людям.</p>


                                    <span class="content__text__title">Материальная помощь проекту</span>
                                    <p>Если у Вас есть желание и возможность поддержать наш проект денежными средствами, мы будем очень признательны за это.
                                        Денежные средства пойдут на дальнейшее развитие проекта. Вы можете перечислить любую сумму, которая для вас будет комфортна.</p>
                                    <p>Сделать Вы это можете следующими способами:</p>
                                    <br>
                                    <iframe src="https://money.yandex.ru/quickpay/shop-widget?writer=seller&targets=%D0%9F%D0%BE%D0%B4%D0%B4%D0%B5%D1%80%D0%B6%D0%B0%D1%82%D1%8C%20%D0%BF%D1%80%D0%BE%D0%B5%D0%BA%D1%82&targets-hint=&default-sum=100&button-text=11&payment-type-choice=on&mobile-payment-type-choice=on&hint=&successURL=&quickpay=shop&account=410014125460102" width="450" height="214" frameborder="0" allowtransparency="true" scrolling="no"></iframe>
                                    <br><br>
                                    <p><b>Мы будем очень благодарны Вам за любую поддержку нашего проекта «Суп Студента»!</b></p>
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