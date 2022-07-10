<?php

namespace App\Models;

/**
 * Modelo da entidade de ClienteController
 */
class Cliente extends \Illuminate\Database\Eloquent\Model
{
    protected $fillable = [ 'nome', 'telefone', 'cpf', 'placa_carro' ];
    public $timestamps = false;

    /**
     * Busca todos os clientes com o final da placa igual a $number.
     * @param $number
     * @return $this[]
     */
    public function searchByLastPlateNumber($number)
    {
        return $this->where('placa_carro', 'LIKE', "%{$number}")->get();
    }

}