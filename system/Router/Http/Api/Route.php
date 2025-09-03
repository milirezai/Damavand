<?php
namespace System\Router\Http\Api;

use System\Router\Http\Router\Router;
use System\Router\Http\Router\RouterMethods\Api\ApiMethods;

class Route extends Router implements ApiMethods
{
    public static function get(string $url, $control, string $name)
    {
        self::$httpVerb = 'get';
        self::$url = self::url($url);
        self::$controller = $control[0];
        self::$method = $control[1];
        self::$name = $name;
        self::push();
        return new static;
    }
    public static function post(string $url, $control, string $name)
    {
        self::$httpVerb = 'post';
        self::$url = self::url($url);
        self::$controller = $control[0];
        self::$method = $control[1];
        self::$name = $name;
        self::push();
        return new static;
    }

}