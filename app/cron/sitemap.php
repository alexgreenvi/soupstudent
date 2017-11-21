<?php
/**
 * @arParam массив праметров компонента
 * @arResult массив результата
 * @arItem массив отдельного элемента
 * @arAjax массив отдельного элемента
 */
// Подключаем ajax >>
require_once($_SERVER['DOCUMENT_ROOT'] . '/app/ajax.php');
// ..

if(!file_exists($_SERVER['DOCUMENT_ROOT']."/sitemap.xml")) echo "Внимание! Файл не найден!";

$date = date("Y-m-d");
function datas($text){
    $text = mb_substr($text, 0, -9);
    return $text;
};

$site_name = "http://soupstudent.com";
$FileSiteMap = fopen($_SERVER['DOCUMENT_ROOT'].'/sitemap.xml', 'w+');


$FileSiteMapText = '<?xml version="1.0" encoding="UTF-8"?>
	<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
	   <url>
	      <loc>'.$site_name.'</loc>
	      <lastmod>'.$date.'</lastmod>
	      <changefreq>weekly</changefreq>
	      <priority>1</priority>
	   </url>
	';
// Учителя
$arResult = Database::select('all', 'teacher',
    '', 'status = "1"', [0,6000], '');
foreach ($arResult as $arItem) {
    $FileSiteMapText = $FileSiteMapText.'   <url>
      <loc>'.$site_name."/teacher/".$arItem['id'].'</loc>
      <changefreq>weekly</changefreq>
	     <priority>0.9</priority>
	   </url>
	';
}

// Универы
$arResult = Database::select('all', 'university',
    '', '', '', '');
foreach ($arResult as $arItem) {

    $FileSiteMapText = $FileSiteMapText.'   <url>
	      <loc>'.$site_name."/university/".$arItem['id'].'</loc>
	      <changefreq>weekly</changefreq>
	      <priority>0.8</priority>
	   </url>
	';
}

// Региона
$arResult = Database::select('all', 'region',
    '', '', '', '');
foreach ($arResult as $arItem) {
    $FileSiteMapText = $FileSiteMapText.'   <url>
	      <loc>'.$site_name."/region/".$arItem['id'].'</loc>
	      <changefreq>weekly</changefreq>
	      <priority>0.7</priority>
	   </url>
	';
}

// Города
$arResult = Database::select('all', 'city',
    '', '', '', '');
foreach ($arResult as $arItem) {
    $FileSiteMapText = $FileSiteMapText.'   <url>
	      <loc>'.$site_name."/city/".$arItem['id'].'</loc>
	      <changefreq>weekly</changefreq>
	      <priority>0.6</priority>
	   </url>
	';
}

$FileSiteMapText = $FileSiteMapText.'</urlset>';
fwrite($FileSiteMap, $FileSiteMapText);
fclose($FileSiteMap);
