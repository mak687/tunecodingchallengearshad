<?php

use Illuminate\Http\Request;
use App\User;

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
/*
Route::get('user', function() {
    // If the Content-Type and Accept headers are set to 'application/json', 
    // this will return a JSON structure. This will be cleaned up later.
    return User::all();
});
 
Route::get('user/{id}', function($id) {
    return User::find($id);
});
*/
Route::get('employee', 'API\EmployeeController@index');
Route::get('employee/{id}', 'API\EmployeeController@show');
Route::get('showEmployeeEvent', 'API\EmployeeController@showEventByEmployee');
Route::get('showEmployeeEvent/{sortby}/{order}', 'API\EmployeeController@showEventByEmployee');

