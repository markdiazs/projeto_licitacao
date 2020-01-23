<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Licitacao extends Model
{
    public function anexos()
    {
        return $this->hasMany(Anexo::class,'id','licitacao_id');
    }
}
