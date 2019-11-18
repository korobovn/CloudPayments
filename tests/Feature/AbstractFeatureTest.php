<?php

namespace Korobovn\Tests\Feature;

use GuzzleHttp\Client;
use Illuminate\Support\Arr;
use PHPUnit\Framework\TestCase;
use Korobovn\CloudPayments\Client\CloudPaymentClient;

abstract class AbstractFeatureTest extends TestCase
{
    /** @var CloudPaymentClient */
    protected $client;

    protected function setUp(): void
    {
        $config      = include __DIR__ . '/../../config/services.php';
        $public_key  = Arr::get($config, 'cloud_payments.public_key');
        $private_key = Arr::get($config, 'cloud_payments.private_key');

        $this->client = new CloudPaymentClient(
            new Client,
            $public_key,
            $private_key
        );
    }
}
