<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

    <!-- Icons -->
    <link rel="apple-touch-icon" sizes="76x76" href="/">
    <link rel="icon" type="image/png" href="/assets/img/favicon.png"/>

    <!-- SEO -->
    <title><?=$arParam['title']?></title>
    <meta name="description" content="<?=$arParam['description']?>"/>
    <meta name="robots" content="noodp"/>
    <meta property="og:locale" content="ru_RU" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="<?=$arParam['title']?>" />
    <meta property="og:description" content="<?=$arParam['description']?>" />
    <meta property="og:url" content="http://soupstudent.com/" />
    <meta property="og:site_name" content="Суп студента" />

    <!-- Yandex Master -->
    <meta name="yandex-verification" content="fd94d25b13287acb" />

    <!-- CSS Files -->
    <link rel="stylesheet" href="/assets/css/style.min.css" type='text/css' media='all' />
</head>
<body class="body-content">
<header>
    <div class="header">
        <div class="container">
            <div class="container-aside">
                <div class="header__logo">
                    <a href="/" title="Суп студента">
                        <img src="/assets/img/_header/logo.png" alt="Суп студента">
                    </a>
                </div>
            </div>
            <div class="container-main">
                <div class="row">
                    <div class="col-17 col-lg-16 col-md-24 col-sm-0">
                        <div class="header__search" data-js-core-resize="search" data-js-core-resize-width="sm">
                            <form>
                                <input class="header__search__input" name="header__search" autocomplete="off" placeholder="Введите Ф.И.О преподавателя или название ВУЗа">
                                <button class="header__search__button">
                                    <svg class="core__svg" height="24px" viewBox="0 0 24 24" width="24px" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"></path>
                                        <path d="M0 0h24v24H0z" fill="none"></path>
                                    </svg>
                                </button>
                            </form>
                            <div class="header__search__list">
                                <div class="list list_mini"></div>
                                <div class="header__search__list__footer core__links"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-7 col-lg-8 col-md-none col-sm-24">
                        <div class="header__donate" data-js-core-resize="header__donate" data-js-core-resize-width="sm">
                            <a href="/donate/" title="Поддержите проект" class="core__btn">Поддержите проект</a>
                        </div>
                        <div class="core__mobile__button">
                            <span></span>
                            <span></span>
                            <span></span>
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 50 50" version="1.1">
                                <g id="surface1">
                                    <path style=" " d="M 21 3 C 11.601563 3 4 10.601563 4 20 C 4 29.398438 11.601563 37 21 37 C 24.355469 37 27.460938 36.015625 30.09375 34.34375 L 42.375 46.625 L 46.625 42.375 L 34.5 30.28125 C 36.679688 27.421875 38 23.878906 38 20 C 38 10.601563 30.398438 3 21 3 Z M 21 7 C 28.199219 7 34 12.800781 34 20 C 34 27.199219 28.199219 33 21 33 C 13.800781 33 8 27.199219 8 20 C 8 12.800781 13.800781 7 21 7 Z "></path>
                                </g>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- MOBILE MENU -->
    <div class="core__mobile">
        <div class="container">
            <div data-js-core-resize-after="search">
                <!-- Переносим сюда блок -->
            </div>
            <div data-js-core-resize-after="header__donate">
                <!-- Переносим сюда блок -->
            </div>
        </div>
    </div>
    <!-- END MOBILE MENU -->
</header>
<div class="body-main" role="main">