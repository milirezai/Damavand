<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use System\Service\Support\Upload\Upload;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcom');
    }
}