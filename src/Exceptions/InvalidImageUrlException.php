<?php

namespace APIWHA\SDK\Exceptions;

class InvalidImageUrlException extends \Exception
{
    public function __construct()
    {
        parent::__construct('Image Url must be a valid JPG or PNG url');
    }
}