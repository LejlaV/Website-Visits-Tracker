<?php

use App\Http\Controllers\WebsiteController;
use App\Models\Website;
use Illuminate\Support\Facades\Route;

Route::get('/', [WebsiteController::class, 'index']);
Route::get('/visit', function(){
    return view('visit');
});
Route::post('/websites', [WebsiteController::class, 'store']);