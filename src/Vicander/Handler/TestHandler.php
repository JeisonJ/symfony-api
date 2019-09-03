<?php

namespace App\Vicander\Handler;

/**
 * Prueba de la api
 *
 */
class TestHandler extends BaseHandler
{

    /**
     * Aqui va la logica
     *
     * @return array
     */
    protected function handler() : array
    {
        return ['Vicander is ok'];
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
        return [];
    }
}