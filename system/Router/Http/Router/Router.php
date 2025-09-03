<?php

namespace System\Router\Http\Router;
use System\Router\Http\Router\HelperMethods;

class Router
{
    use HelperMethods;
    protected static $httpVerb;
    protected static $url;
    protected static $controller;
    protected static $method;
    protected static $name;
}