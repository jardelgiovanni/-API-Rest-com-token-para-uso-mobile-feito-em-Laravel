<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Http\Request;


class PedidoControler extends Controller
{
    public function listar()
    {

        // dd(auth()->user());

        // return[
        //     "0" => [
        //         "numero" => "0001",
        //         "valor" => 35.52,
        //         "data" => new \DateTime(),
        //         "usuario" => 1
        //     ],
        //     "1" => [
        //         "numero" => "0002",
        //         "valor" => 5.52,
        //         "data" => new \DateTime(),
        //         "usuario" => 2
        //     ]
        // ];

        $user = auth()->user();

        if(!$user->tokenCan("pedido:listar")){
            return response("nao permitido", 403);
        }

        $pedidos = collect([
            "0" => [
                "numero" => "0001",
                "valor" => 35.52,
                "data" => new \DateTime(),
                "usuario" => 1
            ],
            "1" => [
                "numero" => "0002",
                "valor" => 5.52,
                "data" => new \DateTime(),
                "usuario" => 2
            ]
        ])->where("usuario", $user->id);

        return $pedidos;
    }
}
