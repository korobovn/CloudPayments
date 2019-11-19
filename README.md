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

How to get [CARD_CRYPTOGRAM_PACKET](https://developers.cloudpayments.ru/#skript-checkout)?

### Testing

For package testing we use `phpunit` framework. Just write into your terminal:

```shell
$ git clone https://github.com/korobovn/CloudPayments.git ./CloudPayments && cd $_
$ make build
$ make composer-install
$ make unit-tests
```

## Changes log

[![Release date][badge_release_date]][link_releases]
[![Commits since latest release][badge_commits_since_release]][link_commits]

Changes log can be [found here][link_changeslog].

## Support

[![Issues][badge_issues]][link_issues]
[![Issues][badge_pulls]][link_pulls]

If you will find any package errors, please, [make an issue][link_create_issue] in current repository.


## License

This is open-sourced software licensed under the [MIT License][link_license].



[badge_packagist_version]:https://img.shields.io/packagist/v/korobovn/cloud-payments.svg?maxAge=180
[badge_php_version]:https://img.shields.io/packagist/php-v/korobovn/cloud-payments.svg?longCache=true
[badge_build_status]:https://travis-ci.org/korobovn/CloudPayments.svg?branch=master
[badge_code_quality]:https://img.shields.io/scrutinizer/g/korobovn/CloudPayments.svg?maxAge=180
[badge_coverage]:https://img.shields.io/codecov/c/github/korobovn/CloudPayments/master.svg?maxAge=60
[badge_downloads_count]:https://img.shields.io/packagist/dt/korobovn/cloud-payments.svg?maxAge=180
[badge_license]:https://img.shields.io/packagist/l/korobovn/cloud-payments.svg?longCache=true
[badge_release_date]:https://img.shields.io/github/release-date/korobovn/CloudPayments.svg?style=flat-square&maxAge=180
[badge_commits_since_release]:https://img.shields.io/github/commits-since/korobovn/CloudPayments/latest.svg?style=flat-square&maxAge=180
[badge_issues]:https://img.shields.io/github/issues/korobovn/CloudPayments.svg?style=flat-square&maxAge=180
[badge_pulls]:https://img.shields.io/github/issues-pr/korobovn/CloudPayments.svg?style=flat-square&maxAge=180
[link_releases]:https://github.com/korobovn/CloudPayments/releases
[link_packagist]:https://packagist.org/packages/korobovn/cloud-payments
[link_build_status]:https://travis-ci.org/korobovn/CloudPayments
[link_coverage]:https://codecov.io/gh/korobovn/CloudPayments/
[link_code_quality]:https://scrutinizer-ci.com/g/korobovn/CloudPayments/
[link_changeslog]:https://github.com/korobovn/CloudPayments/blob/master/CHANGELOG.md
[link_issues]:https://github.com/korobovn/CloudPayments/issues
[link_create_issue]:https://github.com/korobovn/CloudPayments/issues/new
[link_commits]:https://github.com/korobovn/CloudPayments/commits
[link_pulls]:https://github.com/korobovn/CloudPayments/pulls
[link_license]:https://github.com/korobovn/CloudPayments/blob/master/LICENSE
[getcomposer]:https://getcomposer.org/download/
