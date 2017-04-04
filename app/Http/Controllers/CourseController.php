<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;


class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	    $all_courses = Course::all();
	    return view('courses.index', compact('all_courses'));        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
	    return view('courses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
	    $course = new Course;

	    $course->name = $request->name;
	    $course->modules = $request->modules;

	    $course->save();

	    return redirect(route('courses.index'));
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
	    $course = Course::findOrFail($id);

	    return view('courses.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
	    $course = Course::findOrFail($id);

	    return view('courses.edit', compact('course')); 
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
	    $course = Course::findOrFail($id);

	    $course->name = $request->name;
	    $course->modules = $request->modules;

	    $course->save();

	    return redirect(route('courses.show', $id));
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
	    $course = Course::findOrFail($id);
	    $course->delete();
	    
	    return redirect(route('courses.index'));
    }
}
