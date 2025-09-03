<?php
namespace System\Router\Http\Router;

trait HelperMethods
{
    protected static function push()
    {
        global $routes;
        array_push
        (
            $routes[self::$httpVerb],
            [
                'url' => self::$url,
                'class' => self::$controller,
                'method' => self::$method,
                'name' => self::$name,
            ]
        );
    }

    protected static function url($url)
    {
        return trim($url,'/ ');
    }

}
