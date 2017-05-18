<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\LearningObject;


class ShelfController extends Controller
{

	public function index($course = 0, $module = 0, $type = 0)
	{
		$courses = Course::orderBy('name', 'asc')->get();

		$query = LearningObject::orderBy('title', 'asc');

		// seletor de objetos por curso
		if ($course != 0){
			$query->where('course_id', '=', $course);
		}

		if ($module != 0){
			$query->where('module', '=', $module);
		}

		if ($type != 0){
			$query->where('type', '=', $type);
		}

		//seletor de objetos por modulo

		//seletor de objetos por tipo

		$current->module = 0;
		$current->type = 0;

		// retornar variavel com selecoes atuais?
		return view('shelf.result', compact('courses', 'learning_objects')); //, 'current'));

	}

	public function search(Request $request)
	{
		//dd($request);

		//$all_learning_objects = LearningObject::all();
		//$all_courses = Course::all();
		return $request; //view('shelf.result', compact('all_learning_objects', 'all_courses'));
	}
}
