<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PedidoItem extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'pastel_id', 'quantidade', 'subtotal'
    ];

    //Defining relation  between Pedido and PedidoItem
    public function pedido()
    {
        return $this->belongsTo(Pedido::class);
    }

    //Defining relation  between PedidoITem and Pasteis
    public function pasteis(){
        return $this->hasMany(Pastel::class);
    }
}
