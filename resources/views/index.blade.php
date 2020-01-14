@extends('layouts.app',["current" => "home"])

@section('body')
    <div class="jumbotron bg-light border-secondary">
        <div class="row">
            <div class="card-deck">
                <div class="card border-primary">
                    <div class="card-body">
                        <h5 class="card-title">Cadastro De Produtos</h5>
                        <p class="card-text">
                            Cadastre o seu produto aqui
                        </p>
                        <a href="/produtos/novo" class="btn btn-primary">Cadastre os produtos</a>
                    </div>
                </div>
                <div class="card border-primary">
                    <div class="card-body">
                        <h5 class="card-title">Cadastro as categorias</h5>
                        <p class="card-text">
                            Cadastre as categorias
                        </p>
                        <a href="/categorias" class="btn btn-primary">Cadastre as categorias</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection