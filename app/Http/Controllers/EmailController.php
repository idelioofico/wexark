<?php

namespace App\Http\Controllers;

use App\Mail\NotificarClienteMail;
use App\Models\Pedido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function sendEmail($to, $pedido)
    {

        dd($pedido);
        $detalhes = [
            'titulo' => 'Confirmação de pedido',
            'pedido' => $pedido
        ];
        Mail::to($to)->send(new NotificarClienteMail($detalhes));

        return "Mail sent";
    }
}
