<?php

namespace App\Http\Controllers;

use App\Mail\NotificarClienteMail;
use App\Models\Pedido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{

    public function enviarNotificacao($to, $pedido)
    {
        $detalhes = [
            'titulo' => 'Confirmação de pedido',
            'pedido' => $pedido
        ];
        Mail::to($to)->queue(new NotificarClienteMail($detalhes));
        return;
    }
}
