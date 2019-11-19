Cloud Payments PHP-client

[![Version][badge_packagist_version]][link_packagist]
[![Version][badge_php_version]][link_packagist]
[![Build Status][badge_build_status]][link_build_status]
[![Coverage][badge_coverage]][link_coverage]
[![Code quality][badge_code_quality]][link_code_quality]
[![Downloads count][badge_downloads_count]][link_packagist]
[![License][badge_license]][link_license] 
 
The package for easy use [Cloud Payments API](https://developers.cloudpayments.ru/#api).

## Install

Require this package with composer using the following command:

```shell
$ composer require korobovn/cloud-payments
```

> Installed `composer` is required ([how to install composer][getcomposer]).


## Frameworks integration

### Laravel 5

Laravel 5.5 and above uses Package Auto-Discovery, so doesn't require you to manually register the service-provider. Otherwise you must add the service provider to the `providers` array in `./config/app.php`:

```php
'providers' => [
    // ...
    Korobovn\CloudPayments\CloudPaymentsServiceProvider::class,
]
```


## Usage

Examples:

```php
<?php

use GuzzleHttp\Client;
use Korobovn\CloudPayments\Client\CloudPaymentClient;
use Korobovn\CloudPayments\Message\Request\CryptogramPaymentOneStepRequest;
use Korobovn\CloudPayments\Message\Response\CryptogramTransactionAcceptedResponse;
use Korobovn\CloudPayments\Message\Response\InvalidRequestResponse;

$public_key  = '';
$private_key = '';

$client = new CloudPaymentClient(
    new Client(),
    $public_key,
    $private_key
);

$request = new CryptogramPaymentOneStepRequest;
$request
    ->setClient($client)
    ->getModel()
    ->setAmount(100.0)
    ->setCurrency('RUB')
    ->setIpAddress('127.0.0.1')
    ->setName('CARDHOLDER NAME')
    ->setCardCryptogramPacket(env('CARD_CRYPTOGRAM_PACKET_WITHOUT_3D_SUCCESS_MASTER_CARD'));

$response = $request->send();

if ($response instanceof CryptogramTransactionAcceptedResponse) {
    $transaction_id = $response->getModel()->getTransactionId();
} elseif ($response instanceof InvalidRequestResponse) {
    $error_message = $response->getMessage();
}
```

### Testing

For package testing we use `phpunit` framework. Just write into your terminal:

```shell
$ git clone https://github.com/korobovn/CloudPayments.git ./CloudPayments && cd $_
$ make build
$ make unit-tests

## Support

[![Issues][badge_issues]][link_issues]
[![Issues][badge_pulls]][link_pulls]



[badge_packagist_version]:https://img.shields.io/packagist/v/korobovn/cloud-payments.svg?maxAge=180
[badge_php_version]:https://img.shields.io/packagist/php-v/korobovn/cloud-payments.svg?longCache=true
[badge_build_status]:https://travis-ci.org/korobovn/CloudPayments.svg?branch=master
[badge_coverage]:https://img.shields.io/codecov/c/github/korobovn/cloud-payments/master.svg?maxAge=60
[link_packagist]:https://packagist.org/packages/korobovn/cloud-payments
