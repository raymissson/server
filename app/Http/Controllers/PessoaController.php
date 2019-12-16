<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pessoa;
class PessoaController extends Controller
{
    public function index(){
        $pessoas = Pessoa::all();
        return view('pessoas.index', compact('pessoas'));

    }

    public function edit($id){
        $pessoa = Pessoa::findOrFail($id);
        return view('pessoas.edit', compact('pessoa'));
    }

    public function create(){
        return view('pessoas.create');
    }

    public function show(Pessoa $pessoa){
        return view('pessoas.index', compact('pessoa'));
    }

    public function store(Request $request){
        $request->validate([
            'nome' => 'required',
            'email' => 'required',
            'cpf' => 'required',
            'nasc' => 'required',
            'tel' => 'required',
            'cep' => 'required',
            'endereco' => 'required',
            'bairro' => 'required',
            'cidade' => 'required',
            'uf' => 'required',
        ]);
        Pessoa::create($request->all());
        return redirect()->route('pessoas.index')->with('sucess','Cliente cadastrado com sucesso');

    }

    public function update(Request $request, $id){
        $validar = $request->validate([
            'id' => 'required',
            'nome' => 'required',
            'email' => 'required',
            'cpf' => 'required',
            'nasc' => 'required',
            'tel' => 'required',
            'cep' => 'required',
            'endereco' => 'required',
            'bairro' => 'required',
            'cidade' => 'required',
            'uf' => 'required',
        ]);
        Pessoa::whereId($id)->update($validar);
        return redirect('pessoas.index')->with('success', 'Cliente atualziado com sucesso');
    }

    public function destroy($id){
        $pessoa = Pessoa::findOrFail($id);
        $pessoa->delete();
        return redirect()->route('/pessoas')->with('sucess','Cliente deletado com sucesso');
    }
    
}
