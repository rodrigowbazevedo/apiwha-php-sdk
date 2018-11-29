<?php

namespace APIWHA\SDK\Exceptions;

class InvalidPDFUrlException extends \Exception
{
    public function __construct()
    {
        parent::__construct('Url must be a valid PDF HTTP address');
    }
}