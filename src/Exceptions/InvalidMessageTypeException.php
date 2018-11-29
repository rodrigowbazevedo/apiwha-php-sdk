<?php

namespace APIWHA\SDK\Exceptions;

class InvalidMessageTypeException extends \Exception
{
    public function __construct()
    {
        parent::__construct('Invalid Message Type');
    }
}