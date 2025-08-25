<?php
namespace System\Request\Traits;

use System\Service\Support\Upload\Image\ImageUpload;

trait Upload
{
    public function move($file, $path, $name_image, $width = 800, $height = 532)
    {
        $path = ImageUpload::move($file, $path, $name_image, $width, $height);
        return $path;
    }
}