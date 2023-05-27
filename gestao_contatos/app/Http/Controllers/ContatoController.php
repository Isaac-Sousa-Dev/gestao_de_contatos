<?php

namespace App\Http\Controllers;

use App\Models\Contato;
use Illuminate\Http\Request;

class ContatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $contatos = Contato::all();

        return view('contato.index', ['contatos' => $contatos, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contato.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $regras = [
            'nome' => 'required|min:5|max:40',
            'email' => 'required|unique:contatos',
            'contato' => 'required|max:9|unique:contatos'
        ];

        $feedback = [
            'nome.required' => 'O campo nome é obrigatório',
            'nome.min' => 'O campo nome tem que ter no mínimo 5 caracteres',
            'nome.max' => 'O nome tem que ter no máximo 40 caracteres',
            'email.required' => 'O campo email é obrigatório',
            'email.unique' => 'Esse email já existe!',
            'contato.unique' => 'Esse contato já existe!',
            'contato.required' => 'O campo contato é obrigatório',
            'contato.max' => 'O contato deve ter no máximo 9 caracteres'
        ];
        
        $request->validate($regras, $feedback);

        $contato = new Contato();

        $contato->fill($request->all());
        $contato->save();

        return redirect()->route('contato.index')->with('msg', 'Contato cadastrado com sucesso!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contato = Contato::findOrFail($id);

        return view('contato.show', ['contato' => $contato]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contato = Contato::findOrFail($id);

        return view('contato.edit', ['contato' => $contato]);
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
        $regras = [
            'nome' => 'required|min:5|max:40',
            'email' => 'required|unique:contatos',
            'contato' => 'required|max:9|unique:contatos'
        ];

        $feedback = [
            'nome.required' => 'O campo nome é obrigatório',
            'nome.min' => 'O campo nome tem que ter no mínimo 5 caracteres',
            'nome.max' => 'O nome tem que ter no máximo 40 caracteres',
            'email.required' => 'O campo email é obrigatório',
            'email.unique' => 'Esse email já existe!',
            'contato.unique' => 'Esse contato já existe!',
            'contato.required' => 'O campo contato é obrigatório',
            'contato.max' => 'O contato deve ter no máximo 9 caracteres'
        ];
        
        $request->validate($regras, $feedback);

        $contato = Contato::findOrFail($id);
   
        $contato->update($request->all());

        return redirect()->route('contato.index')->with('msg', 'Contato editado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        Contato::findOrFail($id)->delete();

        return redirect()->route('contato.index')->with('msg-error', 'Contato excluído com sucesso!');
    }
}
