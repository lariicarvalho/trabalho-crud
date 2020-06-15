<?php

namespace App\Http\Controllers;

use App\Aluno;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AlunoController extends Controller
{
    public function __construct()
    {
        if (!Session::has('alunos')) {
            Session::put('alunos',  []);
        }
    }

    public function index(Request $request)
    {
        return view('alunos.index', [
            'alunos' => $request->session()->get('alunos')
        ]);
    }

    public function create() 
    {
        return view('alunos.create');
    }

    public function store(Request $request)
    {
        $aluno = new Aluno();
        $aluno->id = uniqid();
        $aluno->nome = $request->get('nome');
        $aluno->ra = $request->get('ra');

        $request->session()->push('alunos', $aluno);
        return redirect()->action('AlunoController@index');
    }

    public function edit($id)
    {
        $aluno = $this->findaluno($id);
        return view('alunos.edit', compact('aluno'));
    }

    private function indexOfaluno(string $id)
    {
        return array_reduce(Session::get('alunos'), function ($atual, $aluno) use ($id) {
            return($aluno->id == $id) ? array_search($aluno, Session::get('alunos')) : $atual;
        }, null);
    }

    private function findaluno(string $id)
    {
        return Session::get('alunos')[$this->indexOfaluno($id)];
    }

    public function update($id, Request $request)
    {
        $aluno = $this->findaluno($id);
        $aluno->nome = $request->nome;
        $aluno->ra = $request->ra;
        $this->updatealuno($aluno);
        return redirect()->action('AlunoController@index');
    }

    private function updatealuno($aluno)
    {
        $alunos = Session::get('alunos');
        $aluno->data = new DateTime();
        $key = $this->indexOfaluno($aluno->id);
        $alunos[$key] = $aluno;
        Session::put('alunos',$alunos);
    }

    public function destroy($id)
    {
        $alunos = Session::get('alunos');
        $id = $this->indexOfaluno($id);
        unset($alunos[$id]) ;
        Session::put('alunos',$alunos);
        return redirect()->action('AlunoController@index');

    }
}
