<?php

use App\Http\Controllers\TranslateController;
use Illuminate\Support\Facades\Route;

Route::get('translate',[TranslateController::class,'translate']);
