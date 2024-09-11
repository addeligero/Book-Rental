<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\myController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('allBorrowers',[myController::class,'allBorrowers']);
Route::get("spec/{id}",[myController::class,'spec']);
Route::post("add",[myController::class,'add']);
Route::post("addbook",[myController::class,'addbook']);
Route::get("borrowed",[myController::class,'borrowed']);
Route::post("addborrower",[myController::class,'addborrower']);
Route::post("addborrowedbooks",[myController::class,'addborrowedbooks']);
Route::post('/login', [myController::class, 'login']);
Route::get('allBooks', [myController::class, 'allBooks']);





