@extends('layouts.app',["current" => "produtos"])
@section('body')
    <div class="card border">
         <div class="card-body">
            <form action="/produtos" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nomeCategoria">Título do produto</label>
                    <input type="text" class="form-control" name="nomeProduto" id="nomeProduto" placeholder="título produto">
                </div>
                 <div class="form-group">
                    <label for="nomeCategoria">Estoque</label>
                    <input type="number" class="form-control" name="estoqueProduto" id="estoqueProduto" placeholder="estoque">
                </div>
                 <div class="form-group">
                    <label for="nomeCategoria">Preço</label>
                    <input type="text" class="form-control" name="precoProduto" id="precoProduto" placeholder="Preço">
                </div>    
                <div class="form-group">
                    <label for="nomeCategoria">Categoria:</label>
                    <select name="categoriaProduto" id="categoriaProduto">
                        @foreach ($cats as $cat)
                            <option value="{{$cat->id}}">{{$cat->nome}}</option>
                        @endforeach
                    </select>
                </div>                <button type="route" class="btn btn-primary btn-sn">Salvar</button>
                <a href="/produtos" class="btn btn-danger btn-sn">Cancelar</a>
            </form>
         </div>
    </div>
@endsection
