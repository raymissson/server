<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
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

    public function store(Request $request){
        $pessoa = new Pessoa([
            'nome' => $request->get('nome'),
            'email' => $request->get('email'),
            'cpf' => $request->get('cpf'),
            'nascimento' => $request->get('nascimento'),
            'telefone' => $request->get('telefone'),
            'cep' => $request->get('cep'),
            'endereco' => $request->get('endereco'),
            'bairro' => $request->get('bairro'),
            'cidade' => $request->get('cidade'),
            'uf' => $request->get('uf')
        ]);
        $pessoa->save();
        return redirect('/pessoas')->with('sucess','Cliente cadastrado com sucesso');
    }

    public function update(Request $request, $id){
        $validateData = $request->validate([
            'id' => 'required',
            'nome' => 'required',
            'cpf' => 'required',
            'nascimento' => 'required',
            'email' => 'required',
            'telefone' => 'required',
            'cep' => 'required',
            'endereco' => 'required',
            'bairro' => 'required',
            'cidade' => 'required',
            'uf' => 'required',
        ]);
        Pessoa::whereId($id)->update($validateData);
        return redirect('/pessoas')->with('sucess', 'Cliente atualziado com sucesso');
    }

    public function destroy($id){
        $pessoa = Pessoa::findOrFail($id);
        $pessoa->delete();
        return redirect()->route('/pessoas')->with('sucess','Cliente deletado com sucesso');
    }
    
}
