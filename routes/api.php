<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Players;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/players', [Players::class, "index"]);

Route::post('/players', [Players::class, "store"]);

Route::put('/players', [Players::class, "update"]); 

Route::delete('/players/{player}', [Players::class, "destroy"]);