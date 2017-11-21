<?
header('HTTP/1.1 404 Not Found');
header("Status: 404 Not Found");
?>
<?Application::template('','header',
    [
        'title' => "404",
        'description' => "",
        'keywords' => ""
    ]
);?>
    <div class="container-fluid">
        <div class="container">
            <?Application::template('','aside','');?>
            <main class="container-main indent-none">
                <? Application::component('breadcrumbs', '', '',
                    [
                        '404' => ''
                    ]
                )?>
                <div class="content">
                    <div class="content__main">
                        <br>
                        <div class="content__header__title"><h1>Ошибка 404</h1></div>
                        <div class="content__header__description core__links">
                            <p>Запрашиваемая страница не найдена.</p>
                        </div>
                    </div>
                    <?Application::template('','aside__content','');?>
                </div>
            </main>
        </div>
    </div>
<?Application::template('','footer','');?>