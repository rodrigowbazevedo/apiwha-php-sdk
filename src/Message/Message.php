<?php

namespace APIWHA\SDK\Message;

class Message implements MessageInterface
{
    public $number;
    public $text;
    public $customData;

    public function __construct(string $number, string $text, string $customData = null)
    {
        $this->number = $number;
        $this->text = $text;
        $this->customData = $customData;
    }

    public function getNumber() : string
    {
        return $this->number;
    }

    public function getText() : string
    {
        return $this->text;
    }

    public function getCustomData() : string
    {
        return $this->customData;
    }

    public function hasCustomData() : bool
    {
        return $this->customData !== null;
    }
}