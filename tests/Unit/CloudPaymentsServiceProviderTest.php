<?php

namespace Korobovn\Tests\Unit;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use Korobovn\CloudPayments\Client\CloudPaymentClient;
use Korobovn\CloudPayments\Client\CloudPaymentClientInterface;
use Korobovn\Tests\AbstractTestCase;

/**
 * @group  unit
 * @group  service-provider
 * @covers \Korobovn\CloudPayments\CloudPaymentsServiceProvider
 */
class CloudPaymentsServiceProviderTest extends AbstractTestCase
{
    public function test()
    {

        $this->app->bind(ClientInterface::class, function () {
            return new Client;
        });

        $cloud_payment_client           = $this->app->make(CloudPaymentClient::class);
        $cloud_payment_client_interface = $this->app->make(CloudPaymentClientInterface::class);

        $this->assertInstanceOf(CloudPaymentClient::class, $cloud_payment_client);
        $this->assertInstanceOf(CloudPaymentClientInterface::class, $cloud_payment_client_interface);
    }
}
