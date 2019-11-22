<?php

declare(strict_types = 1);

namespace Korobovn\Tests\Feature;

use GuzzleHttp\Client;
use PHPUnit\Framework\TestCase;
use Korobovn\CloudPayments\Client\CloudPaymentClient;
use Korobovn\CloudPayments\Message\Request\TestRequest;
use Korobovn\CloudPayments\Client\Exception\InvalidHttpResponseCodeException;

/**
 * @group feature
 * @group error-auth
 *
 * @see   https://developers.cloudpayments.ru/#autentifikatsiya-zaprosov
 * @coversNothing
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
