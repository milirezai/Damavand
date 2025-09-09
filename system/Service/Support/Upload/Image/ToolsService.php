<?php

namespace System\Service\Support\Upload\Image;

class ToolsService
{
    protected static $image;
    protected static $imageName;
    protected static $finalImageName;
    protected static $imageDirectory;
    protected static $exclusiveDirectory;
    protected static $finalImageDirectory;
    protected static $width;
    protected static $height;
    public static function image($image)
    {
        self::$image = $image;
        return new static;
    }
    public static function name($imageName)
    {
        self::$imageName = $imageName;
        return new static;
    }
    protected static function getImageName()
    {
        return self::$imageName;
    }
    public static function imageFormat()
    {
        return pathinfo(self::$image['name'], PATHINFO_EXTENSION);
    }
    protected static function finalImageName($finalImageName)
    {
        self::$finalImageName = $finalImageName;
    }
    protected static function getFinalImageName()
    {
        return self::$finalImageName;
    }
    public static function imageDirectory($imageDirectory)
    {
        self::$imageDirectory = trim($imageDirectory, '/\\');
        return new static;
    }
    protected static function getImageDirectory()
    {
        return self::$imageDirectory;
    }
    public static function exclusiveDirectory($exclusiveDirectory)
    {
        self::$exclusiveDirectory = trim($exclusiveDirectory, '/\\');
        return new static;
    }
    protected static function getExclusiveDirectory()
    {
        return self::$exclusiveDirectory;
    }
    protected static function setFinalImageDirectory($finalImageDirectory)
    {
        self::$finalImageDirectory = $finalImageDirectory;
    }
    protected static function getFinalImageDirectory()
    {
        return self::$finalImageDirectory;
    }
    protected static function checkDirectory($imageDirectory)
    {
        if(!file_exists($imageDirectory))
        {
            mkdir($imageDirectory, 0755, true);
        }
    }
    protected static function getImageAddress()
    {
        return self::$finalImageDirectory . DIRECTORY_SEPARATOR . self::$finalImageName;
    }

    protected static function getRealPath()
    {
        return self::$image['tmp_name'];
    }
    public static function delete($imagePath)
    {
        if(file_exists($imagePath))
        {
            unlink($imagePath);
            return true;
        }
        return false;
    }

    public static function fit($width, $height)
    {
        self::$width = $width;
        self::$height = $height;
        return new static;
    }

    public static function getWidth()
    {
        return self::$width;
    }
    public static function getHeight()
    {
        return self::$height;
    }
    protected static function provider()
    {
        // exclusiveDirectory
        self::getExclusiveDirectory() ?? self::exclusiveDirectory(config('image.exclusiveDirectory'));
        // image directory
        self::getImageDirectory() ?? self::imageDirectory(config('image.imageDirectory'));
        // image name
        self::getImageName() ?? self::name(config('image.imageName'));
        // final image name
        self::getFinalImageName() ?? self::finalImageName(self::getImageName().'.'.self::imageFormat());
        // final image directory
        self::getFinalImageDirectory() ?? self::setFinalImageDirectory(self::getExclusiveDirectory().DIRECTORY_SEPARATOR.self::getImageDirectory());
        // check directory
        self::checkDirectory(self::getFinalImageDirectory());
    }
}