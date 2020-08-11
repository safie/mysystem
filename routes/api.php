<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Training;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Training API.
Route::get('trainings', 'Api\TrainingController@index');

// Route::get('trainings', function() {
//     //If content-type and accept headers are set to 'application/json',
//     //this will return a JSON structure. This will be cleaned up later.
//     return Training::all();
//     //this is to list all records
//     //available from http://mysystem.test/api/trainings
// });

Route::get('trainings/{id}', function($id) {
    return Training::find($id);
    //this is to list one specific record by id
    //available from http://mysystem.test/api/trainings/3
});

Route::post('trainings', function(Request $request) {
    return Training::create($request->all);
    //to insert a new record
});

Route::put('trainings/{id}', function(Request $request, $id) {
    $training = Training::findOrFail($id);
    $training->update($request->all());

    return $training;
    //to search record
});

Route::delete('trainings/{id}', function($id) {
    Training::find($id)->delete();
    return 204;
    //to delete one record with spesific id
});
