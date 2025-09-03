<?php
namespace System\Router\Http\Web;

use System\Router\Http\Router\Router;
use System\Router\Http\Router\RouterMethods\Web\WebMethods;

class Route extends Router implements WebMethods
{
    public static function get(string $url, $control, string $name = null)
    {
        self::$httpVerb = 'get';
        self::$url = self::url($url);
        self::$controller = $control[0];
        self::$method = $control[1];
        self::$name = $name;
        self::push();
        return new static;
    }
    public static function post(string $url, $control, string $name = null)
    {
        self::$httpVerb = 'post';
        self::$url = self::url($url);
        self::$controller = $control[0];
        self::$method = $control[1];
        self::$name = $name;
        self::push();
        return new static;
    }
    public static function put(string $url, $control, string $name = null)
    {
        self::$httpVerb = 'put';
        self::$url = self::url($url);
        self::$controller = $control[0];
        self::$method = $control[1];
        self::$name = $name;
        self::push();
        return new static;
    }
    public static function delete(string $url, $control, string $name = null)
    {
        self::$httpVerb = 'delete';
        self::$url = self::url($url);
        self::$controller = $control[0];
        self::$method = $control[1];
        self::$name = $name;
        self::push();
        return new static;
    }
}