<?php

namespace App\Http\Controllers;

use App\Link;
use Illuminate\Http\Request;

class LinkController extends Controller
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
      // não há uma listagem de links
      // links só são acessados pelos materiais
      // aos quais pertencem.

      return redirect(route('learning_objects.index'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return redirect(route('learning_objects.index'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $link = new Link;

      // TODO: implementar upload de materiais
      // TODO: depois remover esse processo de LearningObject

      $link->url = $request->link_input;
      $link->link_type_id = $request->link_type_id;
      $link->learning_object_id = $request->learning_object_id;

      if ($request->file_or_link == 'usar_link') {
        $link->url = $request->link_input;
      } elseif ($request->file_or_link == 'usar_arquivo') {
        $file_with_path = uploadFile($request);

        $link->url = $file_with_path;
      } else {
        return back()->withErrors([
          'Erro', 
          'Forneça um link ou arquivo para o material.'
        ]);
      }

      $link->save();

      // TODO: redirecionar para o material dono do link
      return redirect(route('learning_objects.show', $request->learning_object_id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $link = Link::findOrFail($id);

      return view('links.edit', compact('link'));       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $link = Link::findOrFail($id);

      return view('links.edit', compact('link'));
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
      $link = Link::findOrFail($id);

      $link->link_type_id = $request->link_type_id;
      
      if ($request->file_or_link == 'usar_link') {
        $link->url = $request->link_input;
      } elseif ($request->file_or_link == 'usar_arquivo') {
        $file_with_path = uploadFile($request);

        $link->url = $file_with_path;
      } else {
        return back()->withErrors([
          'Erro',
          'Forneça um link ou arquivo para o material.'
        ]);
      }
      

      $link->save();
      
      // redirecionar para o material ao qual o link pertence
      return redirect(route(
        'learning_objects.show', 
        $link->learning_object->id
      ));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $link = Link::findOrFail($id);
      $link->delete();

      return redirect(route(
        'learning_objects.show', 
        $link->learning_object->id
      ));
    }
}
