<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pedido extends Model
{
    use HasFactory, SoftDeletes;
    // protected $fillable = [
    //     'cliente_id', 'total', 'data_criacao'
    // ];

    protected $guarded=[];

    //Defining relation  between PedidoItem and Pedido
    public function pedido_items()
    {
        return $this->hasMany(PedidoItem::class);
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
}
