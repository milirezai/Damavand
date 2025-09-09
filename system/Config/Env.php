<?php
namespace System\Config;

use Dotenv\Dotenv;

class Env
{
    public static  function get($config, $default = null)
    {
        if ($default == null)
        {
            $config = self::envKey($config);
            return !empty($config) ? $config : null;
        }
        else
        {
            return $default;
        }
    }
    private static function envKey($key)
    {
        $dotenv = Dotenv::createImmutable(dirname(dirname(__DIR__)));
        $dotenv->load();
        $config = $_ENV[$key];
        return $config;
    }
}