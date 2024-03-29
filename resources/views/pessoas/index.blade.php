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
   
    @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}
    </div><br />
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>Nome</th>
            <th>CPF</th>
            <th>Telefone</th>
            <th>Ações</th>
        </tr>
        @foreach ($pessoas as $pessoa)
        <tr>
            <td>{{ $pessoa->nome }}</td>
            <td>{{ $pessoa->cpf }}</td>
            <td>{{ $pessoa->telefone }}</td>
            <td>
                <a href="{{ route('pessoas.edit',$pessoa->id)}}" class="btn btn-primary">Editar</a>
                <form action="{{route('pessoas.destroy', $pessoa->id)}}" method="POST">
                    {{ csrf_field() }}
                    {!! method_field('delete') !!}
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
      
@endsection