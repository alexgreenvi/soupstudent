<?php
/**
 *
 * @arParam массив праметров компонента
 * @arResult массив результата
 * @arItem массив отдельного элемента
 *
 */
?>

<svg width="155" height="30">
    <defs>
        <linearGradient id="gradient-<?=$arParam[id]?>" x1="0" x2="0" y1="1" y2="0">
            <stop offset="10%" stop-color="#c6e48b"></stop>
            <stop offset="33%" stop-color="#7bc96f"></stop>
            <stop offset="66%" stop-color="#239a3b"></stop>
            <stop offset="90%" stop-color="#196127"></stop>
        </linearGradient>
        <mask id="sparkline-<?=$arParam[id]?>" x="0" y="0" width="155" height="28">
            <polyline transform="translate(0, 28) scale(1,-1)"
                      points="0<?
                      for($i = 0; $i <= 155; $i) {
                          echo ",".$arResult[$i/3]['value_3'] * 3 ." ".$i;
                          $i = $i + $step;
                      }
                      ?>"
                      fill="transparent" stroke="#8cc665" stroke-width="2">
            </polyline>
        </mask>
    </defs>

    <g transform="translate(0, -1.5)">
        <rect x="0" y="-2" width="155" height="30"
              style="
                  stroke: none;
                  fill: url(#gradient-<?=$arParam[id]?>);
                  mask: url(#sparkline-<?=$arParam[id]?>);
                "></rect>
    </g>
</svg>


