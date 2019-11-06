<?php

namespace Korobovn\Tests\Feature;

use GuzzleHttp\Client;
use Korobovn\CloudPayments\Client\CloudPaymentClient;
use Korobovn\CloudPayments\Client\Exception\InvalidHttpResponseCodeException;
use Korobovn\CloudPayments\Message\Request\TestRequest;
use PHPUnit\Framework\TestCase;

/**
 * @group feature
 * @group error-auth
 *
 * @see   https://developers.cloudpayments.ru/#autentifikatsiya-zaprosov
 */
class ErrorAuthTest extends TestCase
{
    public function test(): void
    {
        $client = new CloudPaymentClient(
            new Client,
            '',
            ''
        );

        $request = new TestRequest;

        $this->expectException(InvalidHttpResponseCodeException::class);

        $client->send($request);
    }
}
