<?php

namespace Korobovn\Tests\Feature;

use GuzzleHttp\Client;
use Illuminate\Support\Arr;
use Korobovn\CloudPayments\Client\CloudPaymentClient;
use PHPUnit\Framework\TestCase;

abstract class AbstractFeatureTest extends TestCase
{
    /** @var CloudPaymentClient */
    protected $client;

    protected function setUp(): void
    {
        $config      = include __DIR__ . '/../../config/cloud-payments.php';
        $public_key  = Arr::get($config, 'cloud_payments.public_key');
        $private_key = Arr::get($config, 'cloud_payments.private_key');

        $this->client = new CloudPaymentClient(
            new Client,
            $public_key,
            $private_key
        );
    }
}
