<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Helpers\File;

class Pastel extends Model
{
    use HasFactory, SoftDeletes;

    // protected $fillable=[
    //     'nome','preco','foto'
    // ];

    protected $guarded = [];


    //Defining relation  between Pastel and PedidoItem
    public function pedido_items()
    {
        return $this->hasMany(PedidoItem::class);
    }

    //Defining accesors

    public function getFotoAttribute($valor)
    {
        return File::Url($valor);
    }
}
