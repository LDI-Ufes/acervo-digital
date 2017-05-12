<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Book;


class ShelfController extends Controller
{

	public function index($course = 0, $module = 0, $type = 0)
	{
		if ($course == 0){
			$courses = Course::orderBy('name', 'asc')->get();
		} else {
			$courses = Course::findOrFail($course);
		}

		if ($module == 0){
			$books = Book::orderBy('title', 'asc')->get();
		} else {
			$books = $courses->books->where('module', '=', $module);
		}

		return view('shelf.result', compact('courses', 'books'));
		//return '$course = '. $course .'<br/>$module = '. $module .'<br/>$type = '.$type .'<hr>';
	}

	public function search(Request $request)
	{
		//dd($request);

		//$all_books = Book::all();
		//$all_courses = Course::all();
		return $request; //view('shelf.result', compact('all_books', 'all_courses'));
	}
}
