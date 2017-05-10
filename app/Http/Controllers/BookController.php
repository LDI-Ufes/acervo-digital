<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Book;

class BookController extends Controller
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
	    $all_books = Book::orderBy('title', 'asc')->paginate(50);
	    //$all_books = DB::table('books')->orderBy('title')->paginate(30);
	    return view('books.index', compact('all_books'));        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
	    $courses = Course::all();

	    return view('books.create', compact('courses'));
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

	   
	    $book = new Book;

	    $book->title = $request->title;
	    $book->author = $request->author;
	    $book->summary = $request->summary;
	    $book->pdf = $request->pdf;
	    $book->course_id = $request->course_id;	

	    // checar se o módulo não é maior do que os que o curso oferece
	    $book->module = $request->module;


	    //checar se a imagem tem o tamanho necessário (219x219) 
	    //e dar resize se não tiver
	    //
	    if ($request->hasFile('cover')){
		    $image = $request->file('cover');
		    $input['cover'] = time().'.'.$image->extension();

		    $destinationPath = public_path('/covers');
		    $image->move($destinationPath, $input['cover']);

		    $book->cover = $input['cover'];

	    } else {
	    	$book->cover = "default.jpg";
	    }

	    $book->save();

	    return redirect(route('books.index'));        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
	    $book = Book::findOrFail($id);

	    return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
	    $book = Book::findOrFail($id);
	    $courses = Course::all();

	    return view('books.edit', compact('book', 'courses'));
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

	    $book = Book::findOrFail($id);

	    $book->title = $request->title;
	    $book->author = $request->author;
	    $book->summary = $request->summary;
	    $book->pdf = $request->pdf;
	    $book->course_id = $request->course_id;	

	    // checar se o módulo não é maior do que os que o curso oferece
	    $book->module = $request->module;

	    // falta fazer o upload, checagem e resize do arquivo de capa...
	    //$book->cover = $request->cover 
	    //

	    $book->save();

	    return redirect(route('books.show', $id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
	    $book = Book::findOrFail($id);
	    $book->delete();
	    
	    return redirect(route('books.index'));
    }
}
