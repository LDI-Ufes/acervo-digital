<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CourseType;
use App\Course;
use App\ObjectType;
use App\LearningObject;


class ShelfController extends Controller
{

	public function index_with_module($course = 0, $module = 0, $type = 0)
	{
		//$courses = Course::orderBy('name', 'asc')->get();

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


	public function learningObjects($course = 0, $type = 0, $year = 0)
	{
		//$courses = Course::orderBy('name', 'asc')->get();

		$query = LearningObject::orderBy('title', 'asc');

		$current = (object)Array(
			'course' => "Todos os Cursos",
			'year' => "Todos os Anos",
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
		
		//seletor de objetos por tipo
		if ($type != 0){
			$query->where('type_id', '=', $type);
			$current->type = ObjectType::findOrFail($type)->name;
			$current->type_id = $type;
		}

		//seletor de objetos por ano
		if ($year != 0){
			$query->where('year', '=', $year);
			$current->year = $year;
		}

		$learning_objects = $query->get();

		return view('shelf.learning_objects', compact('learning_objects', 'current'));
	}



	public function courses()
	{
		$courses = Course::where('active', '=', 1)->orderBy('name', 'asc')->get()->groupBy('type_id');
		$inactive_courses =  Course::where('active', '=', 0)->orderBy('name', 'asc')->get();
		
		return view('shelf.courses', compact('courses', 'inactive_courses'));
	}
}
