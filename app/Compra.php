<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Compra extends Model
{
    use SoftDeletes;
    
    protected $table = 'compra';
    protected $fillable = ['data', 'cliente_id'];

    public function cliente()
    {
        return $this->belongsTo('App\Cliente');
    }

    public function produto()
    {
        //modelo referenciado, tabela MxN, chaves estrangeiras da tabela MxN -> valor extra na tabela MxN
        return $this->belongsToMany('App\Produto', 'produto_has_compra', 'produto_id', 'compra_id')->withPivot('quantidade');
    }
}
