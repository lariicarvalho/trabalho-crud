@extends('alunos.layout')
@section('title', 'Novo Aluno')
@section('container')

<form action="/alunos/store" method="POST">
    @csrf
    <div class="form-group">
        <label for="nome">Nome:</label>
        <input type="text"
        class="form-control" name="nome" id="nome" aria-describedby="helpId" placeholder="Ex: Gazin">
    </div>
    <div class="form-group">
        <label for="ra">Ra:</label>
        <input class="form-control" name="ra" id="ra">
    </div>
    <div class="form-group">
        <a name="voltar" id="voltar" class="btn btn-primary" href="/alunos" role="button">Voltar</a>
        <button type="submit" href="/alunos" class="btn btn-primary">Cadastrar</button>    
    </div>
</form>
@endsection
