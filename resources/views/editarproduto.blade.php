@extends('layouts.app',["current" => "produtos"])
@section('body')
    <div class="card border">
         <div class="card-body">
         <form action="/produtos/{{$p->id}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nomeCategoria">Título do produto</label>
                    <input type="text" value="{{$p->nome}}" class="form-control" name="nomeProduto" id="nomeProduto" placeholder="título produto">
                </div>
                 <div class="form-group">
                    <label for="nomeCategoria">Estoque</label>
                    <input type="number" value="{{$p->estoque}}" class="form-control" name="estoqueProduto" id="estoqueProduto" placeholder="estoque">
                </div>
                 <div class="form-group">
                    <label for="nomeCategoria">Preço</label>
                    <input type="text" value="{{$p->preco}}" class="form-control" name="precoProduto" id="precoProduto" placeholder="Preço">
                </div>    
                <div class="form-group">
                    <label for="nomeCategoria">Categoria:</label>
                    <select name="categoriaProduto" id="categoriaProduto">
                        @foreach ($cats as $cat)
                            @if ($p->categoria_id == $cat->id)
                            <option selected="selectted" value="{{$cat->id}}">{{$cat->nome}}</option>
                            @endif
                            <option value="{{$cat->id}}">{{$cat->nome}}</option>
                        @endforeach
                    </select>
                </div>                <button type="submit" class="btn btn-primary btn-sn">Salvar</button>
                <button type="submit" class="btn btn-danger btn-sn">Cancelar</button>
            </form>
         </div>
    </div>
@endsection
