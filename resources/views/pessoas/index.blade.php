@extends('pessoas.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Gerenciamento de Clientes</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('pessoas.create') }}">Novo Cliente</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>Nome</th>
            <th>CPF</th>
            <th>Telefone</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($pessoas as $pessoa)
        <tr>
            <td>{{ $pessoa->nome }}</td>
            <td>{{ $pessoa->cpf }}</td>
            <td>{{ $pessoa->telefone }}</td>
            <td>
                <a href="{{ route('pessoas.edit',$pessoa->id)}}" class="btn btn-primary">Editar</a>
            </td>
            <td>
                <form action="{{route('pessoas.destroy', $pessoa->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
      
@endsection