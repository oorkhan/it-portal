<?php

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

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
], function()
{
    /** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/
    Route::get('/', 'HomeController@index')->name('home');
    Route::resource('projects', 'ProjectsController');
    Route::resource('campuses', 'CampusController');
    Route::resource('rooms', 'RoomController');
    Route::resource('equipment-types', 'EquipmentTypeController');
    Route::resource('equipment', 'EquipmentController');
    Route::post('/projects/{project}/tasks', 'ProjectTasksController@store');
    Route::patch('/tasks/{task}', 'ProjectTasksController@update');
    Auth::routes();
});

/** OTHER PAGES THAT SHOULD NOT BE LOCALIZED **/


