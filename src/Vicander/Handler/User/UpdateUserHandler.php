<?php

namespace App\Vicander\Handler\User;

use App\Vicander\Handler\BaseHandler;
use App\Entity\User;
use App\Entity\Rol;
use App\Vicander\Exception\VicanderException;

/**
 * Prueba de la api
 *
 */
class UpdateUserHandler extends BaseHandler
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
        $roll = $manager->getRepository(Rol::class)->find($params['roll_id']);

        if (!$roll) {
            throw new VicanderException('Does not exist roll', BaseHandler::CODE_EXCEPTION,['message' => 'El roll no existe'] );
        }

        if (!$user) {
            throw new VicanderException('Does not exist user', BaseHandler::CODE_EXCEPTION,['message' => 'El usuario no existe'] );
        }

        $user
        ->setName($params['name'])
        ->setRol($roll)
        ->setAge($params['age']);

        $manager->persist($user);
        $manager->flush();

        return [
            'name' => $user->getName(),
            'roll' => $roll->getName(),
            'age' => $user->getAge(),

        ];
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
            'roll_id' => 'required',
            'name' => 'required',
            'age' => 'required'
        ];
    }
}
