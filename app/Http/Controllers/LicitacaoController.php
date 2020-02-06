<?php

namespace App\Http\Controllers;

use App\Anexo;
use App\Licitacao;
use Illuminate\Http\Request;
use App\Modalidade;
use DateTime;
use Facade\FlareClient\Http\Response;
use Illuminate\Support\Facades\DB;

class LicitacaoController extends Controller
{
    public function index()
    {
        $modalidades = Modalidade::All();
        return view('index',['modalidades' => $modalidades]);
    }

    public function create()
    {
        $modalidades = Modalidade::All();
        return view('novalicitacao',['modalidades' => $modalidades]);
    }

    public function busca(Request $request)
    {
        // definindo os filtros para a busca
        $data = [
            'numero'        => $request->input('num_licitacao'),
            'data_abertura' => $request->input('ano_licitacao'),
            'modalidade'    => $request->input('modalidade_licitacao'),
            'objeto'        => $request->input('objeto_licitacao'),
            'situacao'      => $request->input('situacao_licitacao')
        ];

        //recuperando as modalidades
        $modalidades = Modalidade::All();
        
        // recuperando os anexos
        $anexos = Anexo::all();
        
        // buscando licitacoes com base nos filtros
        $licitacao = Licitacao::buscarLicitacoes($data)->paginate(3);

        return view('index',['modalidades' => $modalidades,'result' => $licitacao,'anexo' => $anexos,'dataForm' => $data]);
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'anexoname'             => 'required',
            'titulo_licitacao'      => 'required',
            'numero_licitacao'      => 'required',
            'num_itens_licitacao'   => 'required',
            'modalidade'            => 'required',
            'local_licitacao'       => 'required',
            'cidade_licitacao'      => 'required',
            'abertura_licitacao'    => 'required',
            'contato_licitacao'     => 'required',
            'valor_estimado'        => 'required',
            'impugnacao_licitacao'  => 'required',
            'vencedor_licitacao'    => 'required',
            'objeto_licitacao'      => 'required',
            'situacao'              => 'required'

        ]);

        // formatando a data
        $data_abertura = new DateTime($request->input('abertura_licitacao'));
        $data_abertura->format('Y.m.d');

        $licitacao = [
            'titulo'        => $request->input('titulo_licitacao'),
            'numero'        => $request->input('numero_licitacao'),
            'qtd_itens'     => $request->input('num_itens_licitacao'),
            'modalidade_id' => $request->input('modalidade'),
            'modalidade'    => $request->input('modalidade'),
            'local'         => $request->input('local_licitacao'),
            'cidade'        => $request->input('cidade_licitacao'),
            'data_abertura' => $data_abertura,
            'contato'       => $request->input('contato_licitacao'),
            'valor_estimado'=> $request->input('titulo_licitacao'),
            'impugnacoes'   => $request->input('impugnacao_licitacao'),
            'nome_vendedor' => $request->input('vencedor_licitacao'),
            'objeto'        => $request->input('objeto_licitacao'),
            'situacao'      => $request->input('situacao')
        ];

         $licitacao_id = DB::table('licitacoes')->insertGetId($licitacao);
        // anexos
        if($request->hasFile('anexoname')){

            $anexo = new Anexo();

            foreach($request->file('anexoname') as $anexo){
                $data = [
                    'anexo'         => $licitacao['numero'] .'_'. $anexo->getClientOriginalName(),
                    'link'          => public_path().'/anexos/' . $anexo->getClientOriginalName(),
                    'licitacoes_id' => $licitacao_id
                ];
                $anexo->move(public_path().'/anexos/',$data['anexo']);
                DB::table('anexos')->insert($data);
                
            }
            unset($anexo);
        }

        return redirect('/');

    }

    public function consulta ($numero)
    {
        $licitacao = DB::table('licitacoes')->where('numero',$numero)->first();
        $data = new DateTime($licitacao->data_abertura);
        $licitacao->data_abertura = $data->format('Y');
        $anexos = DB::table('anexos')->where('licitacoes_id',$licitacao->id)->get();
        // // dd($anexos);
        //  var_dump($anexos);
        // exit();
         return view('detalhes_licitacao',['licitacao' => $licitacao,'anexos' => $anexos]) ;
        
    }

    public function baixarArquivo($id)
    {
        $arquivo = Anexo::findOrFail($id);
        // return response()->download(storage_path("public/anexos/".$arquivo->anexo));

        $download_path = ( public_path() . '/anexos/' . $arquivo->anexo );
        return response()->download($download_path);
        
    }
}
