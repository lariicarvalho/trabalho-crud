@extends('alunos.layout')
@section('title', 'Editar Aluno')
@section('container')
<div class="container">
<form action="/alunos/{{ $aluno->id }}/update" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="nome">Nome:</label>
        <input type="text" value="{{ $aluno->nome}}"
        class="form-control" name="nome" id="nome" aria-describedby="helpId" placeholder="Ex: Gazin">
    </div>
    <div class="form-group">
        <label for="ra">Ra:</label>
        <input class="form-control" name="ra" id="ra" value="{{$aluno->ra}}" }>
    </div>
    <div class="form-group">
        <a name="voltar" id="voltar" class="btn btn-primary" href="/alunos" role="button">Voltar</a>
        <button type="submit" class="btn btn-primary">Cadastrar</button>       
    </div>
</div>
@endsection
