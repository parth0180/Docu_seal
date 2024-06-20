<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DocuSealController;


Route::view('/', 'docuseal');


Route::view('/p', 'welcome');



Route::get('/create-docuseal', [DocusealController::class, 'createAndRedirect']);
