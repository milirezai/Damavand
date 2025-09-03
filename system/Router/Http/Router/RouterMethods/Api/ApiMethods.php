<?php

namespace System\Router\Http\Router\RouterMethods\Api;
interface ApiMethods
{
    public static function get(string $url, $control, string $name);
    public static function post(string $url, $control, string $name);

}