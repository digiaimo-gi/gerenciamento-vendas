<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    use SoftDeletes;
    
    protected $table = 'cliente';
    protected $fillable = ['tipo', 'numero', 'cliente_id'];

    public function Clientes()
    {
        return $this->belongsTo('App\Cliente');
    }
}
