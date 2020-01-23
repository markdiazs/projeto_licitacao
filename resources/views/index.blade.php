
@extends('layouts.app',["current" => "home"])
<style>
#titulo_page::after {
    background: #aac none repeat scroll 0 0;
    content: "";
    height: 1px;
    margin: 11px 0 0 5px;
    position: absolute;
    width: 50%
}
.form-caixa form {
    width: 45%;
    margin: 0 auto;
}
.form-caixa label {
    width: 136px;
    text-align: right;
}
#btn-pesquisar {
    border: 1px solid #dbdbdb;
    border-radius: 4px;
    box-shadow: inset 0px 1px 0px 0px white;
    color: #777;
    text-shadow: 0px 1px 0px white;
    font-weight: bold;
    padding: 5px 1em 6px 1em;
    margin: 0 0 0 188px;
    height: 32px;
}
.more-link {
    border: 1px solid #dbdbdb;
    border-radius: 4px;
    box-shadow: inset 0px 1px 0px 0px white;
    color: #777;
    text-shadow: 0px 1px 0px white;
    font-weight: bold;
    padding: 5px 1em 6px 1em;
    margin: 0 0 0 0;
    height: 32px;
}
</style>
@section('body')

        <h4 id="titulo_page">Licitaçoes</h4>
        <a class="more-link" href="/novalicitacao">Cadastrar Licitação</a><br><br>
        <p>Apresenta a lista de licitações realizadas – com seu respectivo objeto, número de itens, 
            data, hora e local de abertura – pelo Tribunal Regional do Trabalho da 8ª Região, publicados 
            em atenção ao art. 7º do Ato nº 8/2009 CSJT.GP.SE. Solicite informações adicionais por meio do 
            Serviço de Informação ao Cidadão, que encaminhará sua solicitação à área responsável.</p>
            <div class="form-caixa">
                    <form id="form_busca" action="/busca">
                            <label for="">Número da Licitação:</label>
                    <input name="num_licitacao" id="num_licitacao" type="text" style="width: 50px;" value="{{request()->input('num_licitacao')}}"><br>
                            <label for="">Ano da Licitação:</label>
                    <input name="ano_licitacao" id="ano_licitacao" style="width: 50px;" type="text" width="30px" value="{{request()->input('ano_licitacao')}}"><br>
                            <label for="">Modalidade:</label>
                            <select name="modalidade_licitacao" id="modalidade_licitacao" style="width: 150px;" name="modalidade" id="modalidade">
                                    <option selected value=""></option>    
                                @foreach($modalidades as $modalidade)
                                @if (request()->input('modalidade_licitacao') == $modalidade->id )
                                <option selected value="{{$modalidade->id}}">{{$modalidade->titulo}}</option>   
                                @else
                                <option value="{{$modalidade->id}}">{{$modalidade->titulo}}</option>
                                @endif 
                                @endforeach
                            </select><br>
                            <label for="">Objeto:</label>
                            <input name="objeto_licitacao" id="objeto_licitacao" style="width: 250px;" type="text" width="30px" value="{{request()->input('objeto_licitacao')}}"><br>
                            <label for="">Situação:</label>
                            <select name="situacao_licitacao" id="situacao_licitacao" style="width: 150px;">
                                    @if (request()->input('situacao_licitacao') != "" && request()->input('situacao_licitacao') == 1)
                                    <option selected value="1">Aberta</option>
                                    <option value="0">Fechada</option>
                                    @endif      
                                    @if (request()->input('situacao_licitacao') != "" && request()->input('situacao_licitacao') == 0)
                                    <option  value="1">Aberta</option>
                                    <option selected value="0">Fechada</option>
                                    @endif
                                    @if (request()->input('situacao_licitacao') == null)
                                    <option selected value=""></option>  
                                    <option  value="1">Aberta</option>
                                    <option  value="0">Fechada</option>
                                    @endif
                                    
        
                                </select>
                            <input id="btn-pesquisar" type="submit" value="pesquisar">
                        </form>
            </div><br>
        @if (isset($result))
        <div style="width:20%;margin: 0 auto;" class="links_busca">
            {{$result->appends(['num_licitacao' => $dataForm['numero'],
            'ano_licitacao' => $dataForm['data_abertura'],
            'modalidade_licitacao' => $dataForm['modalidade'],
            'objeto_licitacao' => $dataForm['objeto'],
            'situacao_licitacao' => $dataForm['situacao']])->links()}}
            @php
                // var_dump($result);
            @endphp
        </div>
        
        <div class="cardf">
            <div class="card-bodyf">
               
                <div class="cardf">
                        @foreach ($result as $item)
                        <div class="card-body">
                        <h5 class="card-title">{{$item->titulo}} nº {{$item->numero}}</h5>
                            <h4>Situação: @if ($item->situacao == 1)
                                ABERTA
                            @else
                                FECHADA
                            @endif</h4>
                            <p class="card-text"><b>Obejto: </b> {{$item->objeto}}</p>
                            <a  class="more-link" href="/licitacao/{{$item->numero}}" class="btn btn-primary">[+]Detalhes</a>
                        </div>
                        @endforeach
                        <div class="card-footed" style="margin: 0 auto;">
                                
                        </div>
                      </div>
            </div>
        </div>
        @endif
@endsection