<?php

use System\Router\Http\Api\Route;
use App\Http\Controllers\ApiController;




 Route::get('/home',[ApiController::class,'api'],'home.api');