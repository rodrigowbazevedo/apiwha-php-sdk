<?php

namespace APIWHA\SDK\Message;

use APIWHA\SDK\Exceptions\InvalidAudioUrlException;

class Audio extends Message
{
    public function __construct(string $number, string $url, string $customData = null)
    {
        if(!preg_match('/^https?\:\/\/(.*)\.ogg$/', $url)){
            throw new InvalidAudioUrlException;
        }

        parent::__construct($number, $url, $customData);
    }
}