<?php

// Va nous permettre de formater mes prix totaux

function getPrice($price)
{
    $price = floatval($price) / 100;

    return number_format($price, 2, ',',' ');
}