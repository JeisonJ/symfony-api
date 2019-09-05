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

        $user = $manager->getRepository(User::class)->find($params['id']);

        if (!$user) {
            throw new VicanderException('Does not exist user', BaseHandler::CODE_EXCEPTION,['message' => 'El usuario no existe'] );
        }
        
        $response = [
            'name'=>$user->getName(),
            'rol'=>[
                'id' => $user->getRol()->getId(),
                'name' => $user->getRol()->getName()
                ],
            'age'=>$user->getAge(),

        ];

        return $response;
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
