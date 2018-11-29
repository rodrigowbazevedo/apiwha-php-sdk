<?php

namespace APIWHA\SDK\Message;

use APIWHA\SDK\Exceptions\InvalidPDFUrlException;

class PDF extends Message
{
    public function __construct(string $number, string $url, string $customData = null)
    {
        if(!preg_match('/^https?\:\/\/(.*)\.pdf$/', $url)){
            throw new InvalidPDFUrlException;
        }

        parent::__construct($number, $url, $customData);
    }
}