<?php

use App\Entities\User;
use App\Events\User\Created;
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
    event(new Created(User::findOrFail(2)));

//    $content = 'This is a content. This is a content.';
//    return view('emails.layout', compact('content'));
});

//Test Routes
Route::get('/menu', 'TestController@getMenus')->name('menu');
Route::get('/test', 'TestController@test')->name('test');
Route::get('/testData', 'TestController@testData')->name('test');
Route::get('/test/calendar', 'TestController@testCalendar')->name('test.calendar');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
