<div class="breadcrumbs">
    <ul itemscope="" itemtype="http://schema.org/BreadcrumbList">
        <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"><a href="/" title="Главная" itemprop="item">Главная</a></li>
        <?foreach($arParam as $name => $url):?>
            <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                <?if(!empty($url)):?>
                    <a href="<?=$url?>" title="<?=$name?>" itemprop="item">
                        <span itemprop="name"><?=$name?></span>
                    </a>
                <?else:?>
                    <span><?=$name?></span>
                <?endif;?>
            </li>
        <?endforeach;?>
    </ul>
</div>
