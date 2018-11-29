<?php

namespace APIWHA\SDK\Exceptions;

class InvalidAudioUrlException extends \Exception
{
    public function __construct()
    {
        parent::__construct('Audio Url must be a valid OGG Audio url');
    }
}