<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CourseType;

class CourseTypeController extends Controller
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
	    $all_course_types = CourseType::all();
	    return view('course_types.index', compact('all_course_types'));        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
	    return view('course_types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
	    $course_type = new CourseType;

	    $course_type->name = $request->name;

	    $course_type->save();

	    return redirect(route('course_types.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
	    $course_type = CourseType::findOrFail($id);

	    return view('course_types.show', compact('course_type'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
	    $course_type = CourseType::findOrFail($id);

	    return view('course_types.edit', compact('course_type')); 
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
	    $course_type = CourseType::findOrFail($id);

	    $course_type->name = $request->name;

	    $course_type->save();

	    return redirect(route('course_types.show', $id));
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
	    $course_type = CourseType::findOrFail($id);
	    $course_type->delete();
	    
	    return redirect(route('course_types.index'));
    }
}
