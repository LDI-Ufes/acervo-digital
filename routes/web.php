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
Auth::routes();

Route::get('/admin', 'HomeController@index');


// Rotas da Interface Administrativa
Route::resource('/admin/courses', 'CourseController');

Route::resource('/admin/learning_objects', 'LearningObjectController');

Route::resource('/admin/course_types', 'CourseTypeController');

Route::resource('/admin/object_types', 'ObjectTypeController');

// Rotas Públicas (Acesso ao Acervo para alunos e etc)
// ROTA COM MODULO
//Route::get('/shelf/course/{course}/module/{module}/type/{type}', 'ShelfController@index');


Route::get('/curso/{slug}/{type?}/{year?}', 'ShelfController@courseObjectsPage');


// ROTA COM ANO
Route::get('/shelf/course/{course}/type/{type}/year/{year}', 'ShelfController@learningObjects');

//Route::get('/shelf/courses', 'ShelfController@courses');
Route::get('/', 'ShelfController@courses');

Route::get('/sobre', 'ShelfController@about');

Route::get('/about', function () {
	return redirect('/sobre');
});

Route::get('/shelf/', function () {
	return redirect('/');
});

