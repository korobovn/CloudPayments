<?php

namespace Korobovn\Tests\Feature;

use GuzzleHttp\Client;
use Korobovn\CloudPayments\Client\CloudPaymentClient;
use PHPUnit\Framework\TestCase;

abstract class AbstractFeatureTest extends TestCase
{
    /** @var CloudPaymentClient */
    protected $client;

    protected function setUp(): void
    {
        $config            = include 'config.php';
        $public_key  = $config['CLOUD_PAYMENTS_PUBLIC_KEY'] ?? '';
        $private_key = $config['CLOUD_PAYMENTS_PRIVATE_KEY'] ?? '';

        $this->client = new CloudPaymentClient(
            new Client,
            $public_key,
            $private_key
        );
    }
}
