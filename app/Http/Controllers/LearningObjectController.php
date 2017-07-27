<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\ObjectType;
use App\LearningObject;

class LearningObjectController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	    $all_learning_objects = LearningObject::orderBy('title', 'asc')->get();

	    return view('learning_objects.index', compact('all_learning_objects'));        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
	    $courses = Course::orderBy('name', 'asc')->get();
	    $all_types = ObjectType::orderBy('name', 'asc')->get();

	    return view('learning_objects.create', compact('courses', 'all_types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
	    //$this->validate($request, [
		//    'cover' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
	    //]);

	   
	    $learning_object = new LearningObject;

	    $learning_object->title = $request->title;
	    $learning_object->author = $request->author;
	    $learning_object->year = $request->year;
	    $learning_object->summary = $request->summary;
	    $learning_object->link = $request->link;
	    $learning_object->course_id = $request->course_id;	
	    $learning_object->type_id = $request->type_id;

	    // checar se o módulo não é maior do que os que o curso oferece
	    $learning_object->module = $request->module;


	    //checar se a imagem tem o tamanho necessário (219x219) 
	    //e dar resize se não tiver
	    //
	    if ($request->hasFile('cover')){
		    $image = $request->file('cover');
		    $input['cover'] = time().'.'.$image->extension();

		    $destinationPath = public_path('/covers');
		    $image->move($destinationPath, $input['cover']);

		    $learning_object->cover = $input['cover'];

	    } else {
	    	$learning_object->cover = "default.jpg";
	    }

	    $learning_object->save();

	    return redirect(route('learning_objects.index'));        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
	    $learning_object = LearningObject::findOrFail($id);

	    return view('learning_objects.show', compact('learning_object'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
	    $learning_object = LearningObject::findOrFail($id);
	    $courses = Course::orderBy('name', 'asc')->get();
	    $all_types = ObjectType::orderBy('name', 'asc')->get();

	    return view('learning_objects.edit', compact('learning_object', 'courses', 'all_types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

	    $learning_object = LearningObject::findOrFail($id);

	    $learning_object->title = $request->title;
	    $learning_object->author = $request->author;
	    $learning_object->year = $request->year;
	    $learning_object->summary = $request->summary;
	    $learning_object->link = $request->link;
	    $learning_object->course_id = $request->course_id;
	    $learning_object->type_id = $request->type_id;

	    // checar se o módulo não é maior do que os que o curso oferece
	    $learning_object->module = $request->module;

	    // falta fazer o upload, checagem e resize do arquivo de capa...
	    //$learning_object->cover = $request->cover 
	    //

	    $learning_object->save();

	    return redirect(route('learning_objects.show', $id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
	    $learning_object = LearningObject::findOrFail($id);
	    $learning_object->delete();
	    
	    return redirect(route('learning_objects.index'));
    }
}
