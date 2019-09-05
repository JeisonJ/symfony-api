<?php

namespace App\Controller\User;


use App\Vicander\Handler\User\ListUserHandler;
use App\Vicander\Handler\User\DetailUserHandler;
use App\Vicander\Handler\User\CreateUserHandler;
use App\Vicander\Handler\User\UpdateUserHandler;
use App\Vicander\Handler\User\DeleteUserHandler;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;


/**
 * @Route("/users")
 */
class UserController extends AbstractController
{

    /**
     * Listar Usuarios
     *
     * @Route("/", name="list_users", methods="GET")
     *
     * @return JsonResponse
     */
    public function listUser(Request $request)
    {

        $handler = new ListUserHandler($request);
        $handler->processHandler();

        return  $handler->getJsonResponseData();
    }


    /**
     * Crear Usuarios
     *
     * @Route("/", name="create_users", methods="POST")
     *
     * @return JsonResponse
     */
     public function createUser(Request $request)
    {

        $handler = new CreateUserHandler($request);
        $handler->processHandler();

        return  $handler->getJsonResponseData();
    }

    /**
     * Obtener Usuarios
     *
     * @Route("/{id}", name="detail_users", methods="GET")
     *
     * @return JsonResponse
     */
     public function detailUser(Request $request)
    {

        $handler = new DetailUserHandler($request);
        $handler->processHandler();

        return  $handler->getJsonResponseData();
    }

    /**
     * Actualizar Usuarios
     *
     * @Route("/{id}", name="update_users", methods="PUT")
     *
     * @return JsonResponse
     */
     public function updateUser(Request $request)
    {

        $handler = new UpdateUserHandler($request);
        $handler->processHandler();

        return  $handler->getJsonResponseData();
    }

    /**
     * Eliminar Usuarios
     *
     * @Route("/{id}", name="delete_users", methods="DELETE")
     *
     * @return JsonResponse
     */
     public function deleteUser(Request $request)
    {

        $handler = new DeleteUserHandler($request);
        $handler->processHandler();

        return  $handler->getJsonResponseData();
    }



}