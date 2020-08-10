<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*
Route::get('/hello', function () {
    return view('viewhello', [
        'first_name' => 'Anthony',
        'last_name' => 'James'
    ]);
});
*/

Route::get('/hello', 'HelloController@index')->name('hello');
Route::get('/trainings', 'TrainingController@index')->name('training:index');
Route::get('/trainings/create', 'TrainingController@create')->name('training:create');
Route::post('/trainings/store', 'TrainingController@store')->name('training:store');
Route::get('/trainings/{id}', 'TrainingController@show')->name('training:show');
Route::get('/trainings/{id}/edit', 'TrainingController@edit')->name('training:edit');
Route::post('/trainings/{id}', 'TrainingController@update')->name('training:update');
Route::post('/trainings/{id}/delete', 'TrainingController@destroy')->name('training:delete');

//Route::resource('trainings', 'TrainingController');
