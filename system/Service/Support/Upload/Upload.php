<?php

namespace System\Service\Support\Upload;

use Intervention\Image\ImageManager;
use System\Service\Support\Upload\Image\ToolsService;

class Upload extends ToolsService
{
    public static function save()
    {
        self::provider();
        if (self::getWidth() != null and self::getHeight() != null)
            return self::fitAndSaveMethod();
        else
            return self::saveMethod();
    }

    protected static function saveMethod()
    {
        $upload = new ImageManager(['driver' => config('image.driver')]);
        $result = $upload->make(self::getRealPath())->save(self::getImageAddress());
        return $result ? self::getImageAddress() : false;
    }

    private function fitAndSaveMethod()
    {
        $upload = new ImageManager(['driver' => config('image.driver')]);
        $result = $upload->make(self::getRealPath())->fit(self::getWidth(), self::getHeight())->save(self::getImageAddress());
        return $result ? self::getImageAddress() : false;
    }
}
