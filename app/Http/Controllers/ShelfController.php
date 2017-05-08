<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Book;


class ShelfController extends Controller
{

	public function index()
	{
		$all_books = Book::all();
		$all_courses = Course::all();
		return view('shelf.result', compact('all_books', 'all_courses'));
	}

	public function search(Request $request)
	{
		//dd($request);

		//$all_books = Book::all();
		//$all_courses = Course::all();
		return $request; //view('shelf.result', compact('all_books', 'all_courses'));
	}
}
