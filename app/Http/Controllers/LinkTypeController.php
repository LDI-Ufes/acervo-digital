<?php

namespace App\Http\Controllers;

use App\LinkType;
use Illuminate\Http\Request;

class LinkTypeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __contruct()
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
      $all_link_types = LinkType::all();
      return view('link_types.index', compact('all_link_types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('link_types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $link_type = new LinkType;
  
      $link_type->name = $request->name;
      $link_type->call_to_action = $request->call_to_action;
      $link_type->icon = $request->icon;

      $link_type->save();

      return redirect(route('link_types.index'));      
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $link_type = LinkType::findOrFail($id);

      return view('link_types.show', compact('link_type'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id 
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $link_type = LinkType::findOrFail($id);

      return view('link_types.edit', compact('link_type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $link_type = LinkType::findOrFail($id);
 
      $link_type->name = $request->name;
      $link_type->call_to_action = $request->call_to_action;
      $link_type->icon = $request->icon;

      $link_type->save();

      return redirect(route('link_types.show', $id));    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $link_type = LinkType::findOrFail($id)
      $link_type->delete();

      return redirect(route('link_types.index'));
    }
}
