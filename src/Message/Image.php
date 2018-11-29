<?php

namespace APIWHA\SDK\Message;

use APIWHA\SDK\Exceptions\InvalidImageUrlException;

class Image extends Message
{
    public function __construct(string $number, string $url, string $customData = null)
    {
        if(!preg_match('/^https?\:\/\/(.*)\.(jpg|png)$/', $url)){
            throw new InvalidImageUrlException;
        }

        parent::__construct($number, $url, $customData);
    }
}