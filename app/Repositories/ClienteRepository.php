<?php
namespace App\Repositories;

use App\Models\Cliente;


class ClienteRepository extends BaseRepository{
    
    public function __construct(Cliente $cliente)
    {
        parent::__construct($cliente);
    }
}