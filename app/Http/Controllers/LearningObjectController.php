<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\ObjectType;
use App\LearningObject;
use App\Tag;

use Intervention\Image\ImageManagerStatic as Image;


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
      $all_tags = Tag::orderBy('name', 'asc')->get();

	    return view('learning_objects.create', compact('courses', 'all_types', 'all_tags'));
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
	    $learning_object->type_id = $request->type_id;

	    if ($request->file_or_link == 'usar_link') {
		    
		    $learning_object->link = $request->link_input;

	    } elseif ($request->file_or_link == 'usar_arquivo') {

		    $file_ext = $request->file('upload_input')->getClientOriginalExtension();
		 
		    $file_name = basename($request->file('upload_input')->getClientOriginalName(), '.' . $file_ext);
		    $file_name = iconv("UTF-8" , "ASCII//TRANSLIT//IGNORE", $file_name);
		    $file_name = strtolower($file_name);
		    $file_name = preg_replace( array('/[ ]/', '/[^A-Za-z0-9\-]/'), array('-', '-'), $file_name);

		    $request->file('upload_input')->move(public_path('/arquivos'), $file_name . '.' . $file_ext);

		    $learning_object->link = '/arquivos/' . $file_name . '.' . $file_ext;


	    } else {
		    return back()->withErrors(['Erro', 'Forneça o link para o arquivo, ou escolha um arquivo para salvar']);
	    }


	    // checar se o módulo não é maior do que os que o curso oferece
	    $learning_object->module = $request->module;


	    //checar se a imagem tem o tamanho necessário (219x219) 
	    //e dar resize se não tiver
	    //
	    if ($request->hasFile('cover')) {
		    $image = $request->file('cover');

		    $resizer = Image::make($image);
		    $file_name = time().'.'.$image->extension();

		    if (($resizer->width() != 735) or ($resizer->height() != 396)){ 
			    $resizer->fit(735, 396, function ($constraint) {
				$constraint->upsize();
			    }); 
		    }

		    $resizer->save(public_path('/covers') .'/'. $file_name);

		    $learning_object->cover = $file_name;
	    } else {
	    	$learning_object->cover = "_default.jpg";
	    }

	    $learning_object->save();

      $learning_object->course()->attach($request->course_id);

      $learning_object->tags()->attach($request->tag_id);

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
      $all_tags= Tag::orderBy('name', 'asc')->get();

	    return view('learning_objects.edit', compact('learning_object', 'courses', 'all_types', 'all_tags'));
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
	    $learning_object->type_id = $request->type_id;

	    if ($request->file_or_link == 'usar_link') {
		    
		    $learning_object->link = $request->link_input;

	    } elseif ($request->file_or_link == 'usar_arquivo') {

		    $file_ext = $request->file('upload_input')->getClientOriginalExtension();
		 
		    $file_name = basename($request->file('upload_input')->getClientOriginalName(), '.' . $file_ext);
		    $file_name = iconv("UTF-8" , "ASCII//TRANSLIT//IGNORE", $file_name);
		    $file_name = strtolower($file_name);
		    $file_name = preg_replace( array('/[ ]/', '/[^A-Za-z0-9\-]/'), array('-', '-'), $file_name);

		    $request->file('upload_input')->move(public_path('/arquivos'), $file_name . '.' . $file_ext);

		    $learning_object->link = '/files/' . $file_name . '.' . $file_ext;

	    } else {
		    return back()->withErrors(['Erro', 'Forneça o link para o arquivo, ou escolha um arquivo para salvar']);
	    }


	    // checar se o módulo não é maior do que os que o curso oferece
	    $learning_object->module = $request->module;

	    // falta fazer o upload, checagem e resize do arquivo de capa...
	    //$learning_object->cover = $request->cover 

	    if ($request->hasFile('cover')) {
		    $image = $request->file('cover');

		    $resizer = Image::make($image);
		    $file_name = time().'.'.$image->extension();

		    //$resizer->resize(735, 396);


		    if (($resizer->width() != 735) or ($resizer->height() != 396)){ 
			    $resizer->fit(735, 396, function ($constraint) {
				$constraint->upsize();
			    }); 
		    }

		    $resizer->save(public_path('/covers') .'/'. $file_name);

		    $learning_object->cover = $file_name;
	    }

	    $learning_object->save();

      $learning_object->course()->sync($request->course_id);

      $learning_object->tags()->sync($request->tag_id);

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
