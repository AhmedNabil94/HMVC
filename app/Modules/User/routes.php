<?php

    Route::get('/',[\App\Http\Controllers\UserController::class,'index']);
    Route::get('/create',[\App\Http\Controllers\UserController::class,'create']);
    Route::get('/update',[\App\Http\Controllers\UserController::class,'update']);
