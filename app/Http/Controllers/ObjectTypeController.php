<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ObjectType;


class ObjectTypeController extends Controller
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
	    $all_object_types = ObjectType::all();
	    return view('object_types.index', compact('all_object_types'));        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
	    return view('object_types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
	    $object_type = new ObjectType;

	    $object_type->name = $request->name;

	    $object_type->save();

	    return redirect(route('object_types.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
	    $object_type = ObjectType::findOrFail($id);

	    return view('object_types.show', compact('object_type'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
	    $object_type = ObjectType::findOrFail($id);

	    return view('object_types.edit', compact('object_type')); 
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
	    $object_type = ObjectType::findOrFail($id);

	    $object_type->name = $request->name;

	    $object_type->save();

	    return redirect(route('object_types.show', $id));
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
	    $object_type = ObjectType::findOrFail($id);
	    $object_type->delete();
	    
	    return redirect(route('object_types.index'));
    }
}
