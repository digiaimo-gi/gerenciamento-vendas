<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use SoftDeletes;
    
    protected $table = 'cliente';
    protected $fillable = ['nome'];

    
    public function documentos()
    {
        return $this->hasMany('App\Documento');
    }
    /*
    public function vendas()
    {
        return $this->hasMany('App\Venda');
    }

    public function getRg()
    {
        return $this->documentos()->where('tipo', 'rg')->first();
    }

    public function getCpf()
    {
        return $this->documentos()->where('tipo', 'cpf')->first();
    }
    */
}
