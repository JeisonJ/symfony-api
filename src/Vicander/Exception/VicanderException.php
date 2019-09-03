<?php

namespace App\Vicander\Exception;

use App\Vicander\Handler\BaseHandler;

/**
 * Exception para detener el flujo en los Handler. Ideal para
 * validaciones y puntos de control de la aplicacion
 *
 * @author Emilio Ochoa <emilioaor@gmail.com>
 */
class VicanderException extends \Exception
{

    protected $params;

    /**
     * Init Exception
     *
     * @param string $message
     * @param int $code
     */
    public function __construct($message, $code = BaseHandler::CODE_EXCEPTION, array $params = [])
    {  
        $this->params = $params;
        parent::__construct($message, $code, null);
    }


    public function getParams(): array
    {
        return $this->params;
    }

}