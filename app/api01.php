<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class api01 extends Model
{
    //
    protected $fillable=[
        'descricao','preco','cor','peso'
    ];
    
    
    public function categoria()
    {
        return $this->belongsTo('App\Categoria');
    }
}
