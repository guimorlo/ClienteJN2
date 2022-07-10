<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreUpdateCliente;
use Illuminate\Http\Request;

/**
 * Controlador par as operações da entidade de ClienteController.
 */
class ClienteController extends Controller
{
    /** @var \App\Models\Cliente */
    private $repository;

    public function __construct(\App\Models\Cliente $Cliente)
    {
        $this->repository = $Cliente;
    }

    /**
     * Cria um novo registro de cliente.
     * @param StoreUpdateCliente $Request
     * @return mixed
     */
    public function store(StoreUpdateCliente $Request)
    {
        return $this->repository->create($Request->all());
    }

    /**
     * Apresenta os dados de um registro de cliente.
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        $Cliente = $this->repository->where('id', $id)->first();
        if ($Cliente) {
            return response($Cliente);

        }
        return response()->json([ 'message' => "Não existe cliente de código $id" ], 422);
    }

    /**
     * Remove um registro de cliente.
     * @param integer $id
     * @return bool
     */
    public function destroy($id)
    {
        $Cliente = $this->repository->where('id', $id)->first();
        if ($Cliente) {
            return response()->json($Cliente->delete());
        }
        return response()->json([ 'message' => "Não existe cliente de código $id" ], 422);
    }

    /**
     * Atualiza um registro de cliente.
     * @param StoreUpdateCliente $Request
     * @param integer $id
     * @return bool
     */
    public function update(StoreUpdateCliente $Request, $id)
    {
        $Cliente = $this->repository->where('id', $id)->first();
        if ($Cliente) {
            if ($Cliente->update($Request->all())) {
                return response($Cliente);
            }
            return response()->json('Não foi possível atualizar o registro'. 500);
        }
        return response()->json([ 'message' => "Não existe cliente de código $id" ], 422);
    }

    /**
     * Busca todos os Clientes com final da placa igual ao parâmetro informado.
     * @param $numero
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function searchByLastPlateNumber($numero)
    {
        return response($this->repository->searchByLastPlateNumber($numero));
    }
}
