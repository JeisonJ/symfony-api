<?php

namespace App\Vicander\Handler\Rol;

use App\Entity\Rol;
use App\Vicander\Handler\BaseHandler;
use Symfony\Component\Serializer\Serializer;

/**
 *
 * Obtiene el Carrito de compras
 */
class DeleteRolHandler extends BaseHandler
{

    /**
     * Aqui va la logica
     *
     * @return array
     */
    protected function handler() : array
    {
        $manager = $this->getDoctrine()->getManager();

        $rol = $manager->getRepository(Rol::class)->find(5);

        if (!$rol) {
            // throw $this->createNotFoundException(
            //     'No product found for id '.$id
            // );
        }

        $manager->remove($rol);
        $manager->flush();
        

        return [
            'id' => $rol->getId(),
            'name' => $rol->getName()
        ];
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