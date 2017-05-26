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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');


// Rotas da Interface Administrativa
Route::resource('/courses', 'CourseController');

Route::resource('/learning_objects', 'LearningObjectController');

Route::resource('/course_types', 'CourseTypeController');

Route::resource('/object_types', 'ObjectTypeController');

// Rotas Públicas (Acesso ao Acervo para alunos e etc)
Route::get('/shelf/course/{course}/module/{module}/type/{type}', 'ShelfController@index');

Route::get('/shelf/courses', 'ShelfController@courses');

