<?php

declare(strict_types = 1);

namespace Korobovn\Tests\Feature;

use GuzzleHttp\Client as GuzzleHttpClient;
use PHPUnit\Framework\TestCase;
use Korobovn\CloudPayments\Client\Client;
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
        $client = new Client(
            new GuzzleHttpClient,
            '',
            ''
        );

        $request = TestRequest::create();

        $this->expectException(InvalidHttpResponseCodeException::class);

        $client->send($request);
    }
}
