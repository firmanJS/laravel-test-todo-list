<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/','TodoController@index');
Route::post("/task", "TodoController@store");
Route::get("/reloadTodo", "TodoController@getTask");
Route::PATCH("/task/{id}", "TodoController@complete");
Route::delete("/task", "TodoController@destroy");
