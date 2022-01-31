<?php

namespace App\Repositories;

class BoxRepository
{
    private static $colors = [ 'red', 'green', 'blue', 'yellow', 'magenta' ];


    public static function getColors()
    {
        return self::$colors;
    }


    public static function isColor(string $color): bool
    {
        return in_array($color, self::$colors);
    }
}