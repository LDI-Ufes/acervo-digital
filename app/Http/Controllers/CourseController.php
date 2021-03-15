<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\CourseType;

use Intervention\Image\ImageManagerStatic as Image;


class CourseController extends Controller
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
	    $all_courses = Course::orderBy('name','asc')->get();
	    return view('courses.index', compact('all_courses'));        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
	    $all_course_types = CourseType::orderBy('name','asc')->get();
	    return view('courses.create', compact('all_course_types'));
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
	    $course->type_id = $request->type_id;
	    $course->short = $request->short;
	    $course->active = ($request->active === 'on');

      if($request->hasFile('cover')) {
        $image = $request->file('cover');

        $resizer = Image::make($image);
        $file_name = time().'.'.$image->extension();

        if(($resizer->width() != 735) or ($resizer->height() != 396)) {
          $resizer->fit(735, 396, function ($constraint) {
            $constraint->upsize();
          });
        }

        $resizer->save(public_path('/covers') .'/'. $file_name);

        $course->cover = $file_name;
      } else {
        $course->cover = '_default.jpg';
      }

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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
	    $course = Course::findOrFail($id);
	    $all_course_types = CourseType::orderBy('name', 'asc')->get();

	    return view('courses.edit', compact('course', 'all_course_types')); 
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
	    $course->type_id = $request->type_id;
	    $course->short = $request->short;
	    $course->active = ($request->active === 'on');

      if ($request->hasFile('cover')) {
        $image = $request->file('cover');

        $resizer = Image::make($image);
        $file_name = time() .'.'. $image->extension();

        if (($resizer->width() != 735) or ($resizer->height() != 396)) {
          $resizer->fit(735, 369, function ($constraint) {
            $constraint->upsize();
          });
        }

        $resizer->save(public_path('/covers') .'/'. $file_name);

        $course->cover = $file_name;
      }

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
