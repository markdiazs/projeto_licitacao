@extends('layouts.app',["current" => "produtos"])
@section('body')
<div class="card">
        <div class="card-body">
                <table class="table table-striper">
                        <thead>
                            <th>Id</th>
                            <th>Descrição</th>
                            <th>Estoque</th>
                            <th>Preço$</th>
                            <th>Categoria</th>
                            <th>Ações</th>
                        </thead>
                        <tbody>

                            @foreach ($products as $p)
                                <tr>
                                    <td>{{$p->id}}</td>
                                    <td>{{$p->nome}}</td>
                                    <td>{{$p->estoque}}</td>
                                    <td>{{$p->preco}}</td>
                                    <td>@foreach ($cats as $cat)
                                        @if ($p->categoria_id == $cat->id)
                                            {{$cat->nome}}
                                        @endif
                                    @endforeach</td>
                                    <td><a style="margin-right: 5px;" class="btn btn-primary" href="/produtos/{{$p->id}}">Editar</a><a class="btn btn-danger" href="/produtos/apagar/{{$p->id}}">Excluir</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
        </div>
        </div>
        <div class="card-footer">
            <a href="/produtos/novo" class="btn btn-sm btn-primary" role="button">Novo produto</a>
        </div>
    </div>
@endsection

@section('javascript')
@endsection