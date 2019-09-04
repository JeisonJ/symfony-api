<?php

namespace App\Vicander\Handler\User;

use App\Vicander\Handler\BaseHandler;
use App\Entity\User;
use App\Vicander\Exception\VicanderException;

/**
 * Prueba de la api
 *
 */
class DetailUserHandler extends BaseHandler
{

    /**
     * Aqui va la logica
     *
     * @return array
     */
    protected function handler() : array
    {
        $params = $this->getParams();
        $manager = $this->getDoctrine()->getManager();

        $users = $manager->getRepository(User::class)->findAll();

        $response = [];

        foreach ($users as $key => $value) {
        	$response[] = [
        		'id' => $value->getId(),
        		'name' => $value->getName(),
        		'roll' => $value->getRoll(),
        		'age' => $value->getAge()
        	];
        }
        return $respose;
    }

    /**
     * Todas las reglas de validacion para los parametros que recibe
     * el Handler
     *
     * Las reglas de validacion estan definidas en:
     * @see \App\Navicu\Service\NavicuValidator
     *
     * @return array
     */
    protected function validationRules() : array
    {
        return [
        ];
    }
}
