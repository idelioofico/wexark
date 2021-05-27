<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    use HasFactory,SoftDeletes;
    // protected $fillable=[
    //     'nome',
    //     'email',
    //     'telefone',
    //     'endereco',
    //     'data_nascimento',
    //     'cep',
    //     'data_cadastro',
    //     'complemento_endereco',
        
    // ];

    protected $guarded=[];
}
