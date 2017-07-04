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
			'module_id' => 0,
			'type' => "Todos os Tipos",
			'type_id' => 0,
			'number_of_modules' => 0,
			'object_types' => ObjectType::all(),
		);

		// seletor de objetos por curso
		if ($course != 0){
			$query->where('course_id', '=', $course);
			$current->course = Course::findOrFail($course)->name;

			//Not sure this is the best way of doing this...
			$current->number_of_modules = Course::findOrFail($course)->modules;
			$current->number_of_types = ObjectType::get()->count();
		}

		//seletor de objetos por modulo
		if ($module != 0){
			$query->where('module', '=', $module);
			$current->module = 'Módulo #'. $module;
			$current->module_id = $module;
		}

		//seletor de objetos por tipo
		if ($type != 0){
			$query->where('type_id', '=', $type);
			$current->type = ObjectType::findOrFail($type)->name;
			$current->type_id = $type;
		}

		$learning_objects = $query->get();

		return view('shelf.result', compact('learning_objects', 'current'));
	}

	public function courses()
	{
		$courses = Course::orderBy('name', 'asc')->get()->groupBy('type_id');
		
		return view('shelf.courses', compact('courses'));
	}
}
