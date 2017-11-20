<?php
/**
 *
 * @arParam массив праметров компонента
 * @arResult массив результата
 * @arItem массив отдельного элемента
 *
 */
?>

<div class="elDetail-images container-full">
    <div class="container">
        <img src="/source/articles/images/<?=$arResult['id']?>.jpg">
    </div>
</div>

<div class="container-full">
    <div class="container">
        <div class="container-main">
            <div class="elDetail">
                <div class="body">
                    <div class="header">
                        <div class="cat">
                            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <defs>
                                    <linearGradient x1="50%" y1="-227.852%" x2="77.242%" y2="191.341%" id="a">
                                        <stop stop-color="#fff" offset="0%"></stop>
                                        <stop stop-color="#F1F4FD" offset="100%"></stop>
                                    </linearGradient>
                                </defs>
                                <g fill="none" fill-rule="evenodd">
                                    <path d="M13.552 1.959l-.164-.145-.165.145c-.166.145-4.054 3.605-4.054 7.962 0 .581.031 1.146.09 1.69a2.139 2.139 0 0 0-1.825 2.111v3.902a.693.693 0 0 0 .945.645l3.067-1.198c.578.558 1.237.873 1.942.873.711 0 1.376-.32 1.959-.89l3.109 1.215a.694.694 0 0 0 .945-.646v-3.9a2.14 2.14 0 0 0-1.884-2.122c.059-.54.09-1.102.09-1.68 0-4.357-3.89-7.817-4.055-7.962zm-.511 8.648c-.828 0-1.5-.673-1.5-1.5s.672-1.5 1.5-1.5c.827 0 1.5.673 1.5 1.5s-.673 1.5-1.5 1.5z" fill="url(#a)" fill-rule="nonzero" transform="rotate(45 13.417 10.065)"></path>
                                </g>
                            </svg>
                        </div>
                        <div class="name _animated fadeInX"><h1><?=$arResult['name']?></h1></div>
                        <div class="date _animated flipInX">Сегодня в 12 часов </div>
                    </div>

                    <div class="text _text -bbcode _animated fadeInUp">
                        <?=nl2br(bb_code($arResult['text']))?>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-right elLeft">
            <? Application::template('','.right','');?>
        </div>
    </div>
</div>





