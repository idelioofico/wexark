<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pastel extends Model
{
    use HasFactory, SoftDeletes;

    // protected $fillable=[
    //     'nome','preco','foto'
    // ];

    protected $guarded = [];
    

    //Defining relation  between Pastel and PedidoItem
    public function pedido_item()
    {
        return $this->belongsTo(PedidoItem::class);
    }
}
