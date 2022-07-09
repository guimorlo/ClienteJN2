<?php

namespace App\Http\Controllers;
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
     * @param Request $Request
     * @return mixed
     */
    public function store(Request $Request)
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
        return response("Não existe cliente de código $id", 500);
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
            return $Cliente->delete();
        }
        return response("Cliende de id $id não está cadastrado na base", 500);
    }

    /**
     * Atualiza um registro de cliente.
     * @param Request $Request
     * @param integer $id
     * @return bool
     */
    public function update(Request $Request, $id)
    {
        $Cliente = $this->repository->where('id', $id)->first();
        if ($Cliente) {
            if ($Cliente->update($Request->all())) {
                return response($Cliente);
            }
            return response('Não foi possível atualizar o registro'. 500);
        }
        return response("Cliende de id $id não está cadastrado na base", 501);
    }

    public function searchByLastPlateNumber($numero)
    {
        return response($this->repository->searchByLastPlateNumber($numero));
    }
}
