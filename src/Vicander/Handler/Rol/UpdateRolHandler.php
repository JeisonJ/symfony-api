<?php

namespace App\Vicander\Handler\Rol;

use App\Entity\Rol;
use App\Vicander\Handler\BaseHandler;
use Symfony\Component\Serializer\Serializer;

/**
 *
 * Obtiene el Carrito de compras
 */
class UpdateRolHandler extends BaseHandler
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

        $rol = $manager->getRepository(Rol::class)->find($params['id']);

        if (!$rol) {
            throw new VicanderException(
                'Symfony no rol found',
                BaseHandler::CODE_USER_NOT_EXISTS,
                ['message' => 'No se ha encontrado el rol con id '.$params['id']]
            );
        }

        $rol->setName($params['name']);
        $manager->flush();

        return [
            'id' => $rol->getId(),
            'name' => $rol->getName()
        ];;
    }

    /**
     * Todas las reglas de validacion para los parametros que recibe
     * el Handler
     *
     * Las reglas de validacion estan definidas en:
     * @see \App\Vicander\Service\VicanderValidator
     *
     * @return array
     */
    protected function validationRules() : array
    {
        return [];
    }
}