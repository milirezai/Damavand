<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Request\ImageRequest;
use System\Service\Components\Upload\Image\ImageUpload;


class Home extends Controller
{
    public function index()
    {
        return view("welcom");
    }
}