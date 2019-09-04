<?php

namespace App\Vicander\Handler\Rol;

use App\Entity\Rol;
use App\Vicander\Handler\BaseHandler;
use Symfony\Component\Serializer\Serializer;

/**
 *
 * Obtiene el Carrito de compras
 */
class ListRolesHandler extends BaseHandler
{

    /**
     * Aqui va la logica
     *
     * @return array
     */
    protected function handler() : array
    {
        $manager = $this->getDoctrine()->getManager();

        $roles = $manager->getRepository(Rol::class)->findAll();

        $response = [];
        foreach ($roles as $rol) {
            $response[] = [
                'id' => $rol->getId(),
                'name' => $rol->getName()
            ];
        }

        return $response;
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