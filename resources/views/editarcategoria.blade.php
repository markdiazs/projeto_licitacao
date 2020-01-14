@extends('layouts.app',["current" => "categorias"])
@section('body')
    <div class="card border">
         <div class="card-body">
            <form action="/categorias/{{$cat->id}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nomeCategoria">Nome da Categoria</label>
                    <input type="text" class="form-control" name="nomeCategoria" value="{{$cat->nome}}" id="nomeCategoria" placeholder="Nome da categoria">
                </div>
                <button type="submit" class="btn btn-primary btn-sn">Salvar</button>
                <button type="submit" class="btn btn-danger btn-sn">Cancelar</button>
            </form>
         </div>
    </div>
@endsection
