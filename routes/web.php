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

Route::resource('/admin/tags', 'TagController');

Route::resource('/admin/link_types', 'LinkTypeController');

Route::resource('/admin/links', 'LinkController');

// Rotas Públicas (Acesso ao Acervo para alunos e etc)
// ROTA COM MODULO
//Route::get('/shelf/course/{course}/module/{module}/type/{type}', 'ShelfController@index');


Route::get('/curso/{slug}/{type?}/{year?}', 'ShelfController@courseObjectsPage');

Route::get('/embed/{slug}/{type?}/{year?}', 'ShelfController@courseObjectsIFrame'); // TODO: remover rota/controler/blades

// ROTA COM ANO
Route::get('/shelf/course/{course}/type/{type}/year/{year}', 'ShelfController@learningObjects'); // TODO: remover rota/controller/blades


//Route::get('/shelf/courses', 'ShelfController@courses');
Route::get('/', 'ShelfController@courses');

// detalhes de material
Route::get('/materiais/{slug}', 'ShelfController@objectDetails');

// todos os materiais,listagem e pesquisa.
Route::get('/catalogo/{query?}', 'ShelfController@catalogue');


Route::get('/sobre', 'ShelfController@about');

Route::get('/about', function () {
	return redirect('/sobre');
});

Route::get('/shelf/', function () {
	return redirect('/');
});

