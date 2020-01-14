@extends('layouts.app',["current" => "categorias"])
@section('body')
    <div class="card">
        <div class="card-body">
                <table class="table table-striper">
                        <thead>
                            <th>Id</th>
                            <th>Descrição</th>
                            <th>Ações</th>
                        </thead>
                        <tbody>
                            @foreach ($cats as $cat)
                                <tr>
                                    <td>{{$cat->id}}</td>
                                    <td>{{$cat->nome}}</td>
                                    <td><a style="margin-right: 5px;" class="btn btn-primary" href="/categorias{{'/'.$cat->id}}">Editar</a><a class="btn btn-danger" href="/categorias/apagar/{{$cat->id}}">Excluir</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
        </div>
        </div>
        <div class="card-footer">
            <a href="/categorias/novo" class="btn btn-sm btn-primary" role="button">Nova categoria</a>
        </div>
    </div>

@endsection