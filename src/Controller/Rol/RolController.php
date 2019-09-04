<?php

namespace App\Controller\Rol;

use App\Vicander\Handler\Rol\ListRolesHandler;
use App\Vicander\Handler\Rol\CreateRolHandler;
use App\Vicander\Handler\Rol\DeleteRolHandler;
use App\Vicander\Handler\Rol\UpdateRolHandler;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;


/**
 * @Route("/roles")
 */ 
class RolController extends AbstractController
{
    /**
     * Retorna la lista de roles registrados.
     *
     * @Route("/", name="list_roles", methods="GET")
     * 
     *
     * @return JsonResponse
     */
    public function listRoles(Request $request)
    {
        $handler = new ListRolesHandler($request);
        $handler->processHandler();
    
        return  $handler->getJsonResponseData();
    }
    
    /**
     * Crea un rol.
     * 
     * @Route("/", name="create_rol", methods="POST")
     * 
     *
     * @return JsonResponse
     */
    public function createRol(Request $request)
    {
        $handler = new CreateRolHandler($request);
        $handler->processHandler();

        return $handler->getJsonResponseData();
    }

    /**
     * Elimina un rol.
     * 
     * @Route("/", name="delete_rol", methods="DELETE")
     * 
     *
     * @return JsonResponse
     */
    public function deleteRol(Request $request)
    {
        $handler = new DeleteRolHandler($request);
        $handler->processHandler();

        return $handler->getJsonResponseData();
    }

    /**
     * Actualiza un rol.
     * 
     * @Route("/", name="update_rol", methods="PUT")
     * 
     *
     * @return JsonResponse
     */
    public function updateRol(Request $request)
    {
        $handler = new UpdateRolHandler($request);
        $handler->processHandler();

        return $handler->getJsonResponseData();
    }
}
