<?php

namespace App\Vicander\Handler\Rol;

use App\Entity\Rol;
use App\Entity\User;
use App\Vicander\Handler\BaseHandler;
use Symfony\Component\Serializer\Serializer;
use App\Vicander\Exception\VicanderException;

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
        $params = $this->getParams();
        $manager = $this->getDoctrine()->getManager();

        // Valida si no existen usuarios que tengan el rol asociado.
        $rolExist = $manager->getRepository(Rol::class)->find($params['id']);
        $rolUser  = $manager->getRepository(User::class)->findBy(['rol' => $params['id']]);

        if (!$rolExist) {
            throw new VicanderException(
                'Symfony no rol found',
                BaseHandler::DELETE_ROL,
                ['message' => 'No se ha encontrado el rol con id '.$params['id']]
            );
        } 
        
        if (!empty($rolUser)) {
            throw new VicanderException(
                'Symfony Rol already used',
                BaseHandler::DELETE_ROL,
                ['message' => 'El rol ya está siendo usado por usuarios']
            );
        }

        // si no cuenta con usuarios asociados procede a eliminar.
        $manager->remove($rolExist);
        $manager->flush();  

        return ["status" => 200];
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