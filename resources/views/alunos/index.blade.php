@extends('alunos.layout')
@section('title', 'Alunos Cadastrados')
@section('container')
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>RA</th>
            <th>#</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($alunos as $aluno)
            <tr>
                <td>{{$aluno->id}}</td>
                <td>{{$aluno->nome}}</td>
                <td>{{$aluno->ra }}</td>
                <td> 
                    <div class="btn-group"> 
                    <a name="editar" id="editar" class="btn btn-primary" href="/alunos/{{ $aluno->id }}/edit" role="button">Editar</a>
                        <form action="{{route('alunos.delete', ['id' => $aluno->id])}}" method="POST">
                            @csrf
                            @method("DELETE")
                            <button type="submit" name="delete" id="delete" class="btn btn-danger">Remover</button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<a name="novo" id="novo" class="btn btn-primary" href="/alunos/create" role="button">Novo aluno</a>
@endsection
