# APIWHA PHP SDK

A simple PHP SDK for [apiwha.com](apiwha.com) WhatsApp API

## Usage

`composer require rodrigowba/apiwha-php-sdk`

#### Create Client
```php
use APIWHA\SDK\Factory;

$apiKey = 'API_KEY';

$client = (new Factory)->create($apiKey);
```
or
```php
use APIWHA\SDK\Client;

$apiKey = 'API_KEY';

$client = new Client($apiKey, new GuzzleHttp\Client);
```
#### Send Message
```php
use APIWHA\SDK\Message\Message;
use APIWHA\SDK\Message\Image;
use APIWHA\SDK\Message\Audio;
use APIWHA\SDK\Message\PDF;

$number = '555555555555';

$message = new Message($number, 'Text message');
$message = new Message($number, 'Text message', 'custom_data');
$response = $client->send($message);

// Image Url must start with http and end with .jpg or .png
$url = 'http://addrress/image.jpg';
$message = new Image($number, $url);
$response = $client->send($message);

// Audio Url must start with http and end .ogg
// Only OGG audio supported
$url = 'http://addrress/audio.ogg';
$message = new Audio($number, $url);
$response = $client->send($message);

// PDF Url must start with http and end with .pdf
$url = 'http://addrress/document.pdf';
$message = new PDF($number, $url);
$response = $client->send($message);
```

#### Get Messages
```php
$client->getMessages();
$client->getInboundMessages();
$client->getOutboundMessages();
$client->getNumberMessages($number);
$client->getCustomDataMessages($customData);
```

#### Get Credits
```php
$response = $client->getCredit();
```

## API Reference

#### APIWHA\SDK\Factory
| Methods | Return Type |
|:--|:--|
| create(string $apiKey) | APIWHA\SDK\Client |

#### APIWHA\SDK\Client
| Methods | Return Type |
|:--|:--|
| __construct(string $apiKey, \GuzzleHttp\Client $guzzle) |  |
| send(MessageInterface $message) | array |
| getCredit() | array |
| getMessages(<br/>&nbsp;&nbsp; string $type = null,<br/>&nbsp;&nbsp; string $number = null,<br/>&nbsp;&nbsp; string $customData = null,<br/>&nbsp;&nbsp; bool $markaspulled = false,<br/>&nbsp;&nbsp; bool $getnotpulledonly = false<br/>) | array |
| getInboundMessages(<br/>&nbsp;&nbsp; string $customData = null,<br/>&nbsp;&nbsp; bool $markaspulled = false,<br/>&nbsp;&nbsp; bool $getnotpulledonly = false<br/>) | array |
| getOutboundMessages(<br/>&nbsp;&nbsp; string $customData = null,<br/>&nbsp;&nbsp; bool $markaspulled = false,<br/>&nbsp;&nbsp; bool $getnotpulledonly = false<br/>) | array |
| getNumberMessages(<br/>&nbsp;&nbsp; string $number,<br/>&nbsp;&nbsp; string $type = null,<br/>&nbsp;&nbsp; string $customData = null,<br/>&nbsp;&nbsp; bool $markaspulled = false,<br/>&nbsp;&nbsp; bool $getnotpulledonly = false<br/>) | array |
| getCustomDataMessages(<br/>&nbsp;&nbsp; string $customData,<br/>&nbsp;&nbsp; string $type = null,<br/>&nbsp;&nbsp; bool $markaspulled = false,<br/>&nbsp;&nbsp; bool $getnotpulledonly = false<br/>) | array |

 #### APIWHA\SDK\Message\MessageInterface
 | Constants | Value |
|:--|:--|
| `TYPE_IN` | IN |
| `TYPE_OUT` | OUT |

| Methods | Return Type |
|:--|:--|
| getNumber() | string |
| getText()  | string |
| getCustomData()  | string |
| hasCustomData()  | bool |

  ### Message Types
 - APIWHA\SDK\Message\Message
 - APIWHA\SDK\Message\Image
 - APIWHA\SDK\Message\Audio
 - APIWHA\SDK\Message\PDF