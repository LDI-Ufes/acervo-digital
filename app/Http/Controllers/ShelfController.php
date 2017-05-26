<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CourseType;
use App\Course;
use App\ObjectType;
use App\LearningObject;


class ShelfController extends Controller
{

	public function index($course = 0, $module = 0, $type = 0)
	{
		$courses = Course::orderBy('name', 'asc')->get();

		$query = LearningObject::orderBy('title', 'asc');

		$current = (object)Array(
			'course' => "Todos os Cursos",
			'module' => "Todos os Módulos",
			'type' => "Todos os Tipos"
		);

		// seletor de objetos por curso
		if ($course != 0){
			$query->where('course_id', '=', $course);
			$current->course = Course::findOrFail($course)->name;
		}

		//seletor de objetos por modulo
		if ($module != 0){
			$query->where('module', '=', $module);
			$current->module = 'Módulo #'. $module; // this is just fucking dumb.
		}

		//seletor de objetos por tipo
		if ($type != 0){
			$query->where('type_id', '=', $type);
			$current->type = ObjectType::findOrFail($type)->name;
		}

		$learning_objects = $query->get();

		return view('shelf.result', compact('courses', 'learning_objects', 'current'));

	}

	public function courses()
	{
		$courses = Course::orderBy('name', 'asc')->get()->groupBy('type_id');
		
		return view('shelf.courses', compact('courses'));
	}
}
