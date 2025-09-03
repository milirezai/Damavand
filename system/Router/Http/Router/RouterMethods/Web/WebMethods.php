<?php
namespace System\Router\Http\Router\RouterMethods\Web;
interface WebMethods
{
    public static function get(string $url, $control, string $name);
    public static function post(string $url, $control, string $name);
    public static function put(string $url, $control, string $name);
    public static function delete(string $url, $control, string $name);

}