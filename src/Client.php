<?php

namespace APIWHA\SDK;

use APIWHA\SDK\Exceptions\InvalidMessageTypeException;
use APIWHA\SDK\Message\MessageInterface;

use GuzzleHttp\Client as Guzzle;

class Client
{
    const API_URL = 'https://panel.apiwha.com/';

    private $apiKey;
    private $guzzle;

    public function __construct(string $apiKey, Guzzle $guzzle)
    {
        $this->apiKey = $apiKey;
        $this->guzzle = $guzzle;
    }

    public function send(MessageInterface $message) : array
    {
        $query = [
            'apikey' => $this->apiKey,
            'number' => $message->getNumber(),
            'text' => $message->getText(),
        ];

        if($message->hasCustomData()){
            $query['custom_data'] = $message->getCusomData();
        }

        $response = $this->guzzle->get(self::API_URL . 'send_message.php', [
            'query' => $query
        ]);

        return json_decode((string)$response->getBody(), true);
    }

    public function getMessages(
        string $type = null,
        string $number = null,
        string $customData = null,
        bool $markaspulled = false,
        bool $getnotpulledonly = false
    ) : array
    {
        $query = [
            'apikey' => $this->apiKey,
        ];

        if($type !== null){
            $query['type'] = $type;
        }

        if($number !== null){
            $query['number'] = $number;
        }

        if($customData !== null){
            $query['custom_data'] = $customData;
        }

        if($markaspulled){
            $query['markaspulled'] = 1;
        }

        if($getnotpulledonly){
            $query['getnotpulledonly'] = 1;
        }

        $response = $this->guzzle->get(self::API_URL . 'get_messages.php', [
            'query' => $query
        ]);

        return json_decode((string)$response->getBody(), true);
    }

    public function getInboundMessages(
        string $customData = null,
        bool $markaspulled = false,
        bool $getnotpulledonly = false
    ) : array
    {
        return $this->getMessages(MessageInterface::TYPE_IN, null, $customData, $markaspulled, $getnotpulledonly);
    }

    public function getOutboundMessages(
        string $customData = null,
        bool $markaspulled = false,
        bool $getnotpulledonly = false
    ) : array
    {
        return $this->getMessages(MessageInterface::TYPE_IN, null, $customData, $markaspulled, $getnotpulledonly);
    }

    public function getNumberMessages(
        string $number,
        string $type = null,
        string $customData = null,
        bool $markaspulled = false,
        bool $getnotpulledonly = false
    ) : array
    {
        return $this->getMessages($type, $number, $customData, $markaspulled, $getnotpulledonly);
    }

    public function getCustomDataMessages(
        string $customData,
        string $type = null,
        bool $markaspulled = false,
        bool $getnotpulledonly = false
    ) : array
    {
        return $this->getMessages($type, null, $customData, $markaspulled, $getnotpulledonly);
    }

    public function getCredit()
    {
        $response = $this->guzzle->get(self::API_URL . 'get_credit.php', [
            'query' => [
                'apikey' => $this->apiKey,
            ]
        ]);

        return json_decode((string)$response->getBody(), true);
    }
}