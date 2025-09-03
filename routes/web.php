<?php

use System\Router\Http\Web\Route;
use App\Http\Controllers\HomeController;




Route::get('/',[HomeController::class,'index'],'home.index');
