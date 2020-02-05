<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Licitacao extends Model
{
    protected $table = "licitacoes";
    public function anexos()
    {
        return $this->hasMany(Anexo::class,'id','licitacao_id');
    }
    public static function buscarLicitacoes($filtros = []){
        // var_dump($filtros);
        $result = DB::Table('licitacoes')
        ->select('*')
        ->where(function ($query) use($filtros){
            foreach($filtros as $key => $value){
                if($key == 'data_abertura' && $value != ""){
                    $query->whereYear('data_abertura','=',$value);
                }else {
                    $query->where($key,'like','%'.$value.'%');
                }
                
            }
        });
     
        return $result;
        
    }
}
