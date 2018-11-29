<?php

namespace APIWHA\SDK\Message;

interface MessageInterface
{
    const TYPE_IN = 'IN';
    const TYPE_OUT = 'OUT';

    public function getNumber() : string;
    public function getText() : string;
    public function getCustomData() : string;
    public function hasCustomData() : bool;
}