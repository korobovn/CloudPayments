<?php

namespace Korobovn\Tests\Message\Strategy;

use Korobovn\CloudPayments\Message\Response\ApplePayStartSessionResponse;
use Korobovn\CloudPayments\Message\Strategy\ApplePayStartSessionStrategy;

class ApplePayStartSessionStrategyTest extends AbstractStrategyTest
{
    public function setUp(): void
    {
        $this->strategy = new ApplePayStartSessionStrategy;
    }

    public function testCorrectResponse()
    {
        $raw_response = [
            'Model'   => [
                'epochTimestamp'            => 1545111111153,
                'expiresAt'                 => 1545111111153,
                'merchantSessionIdentifier' => 'SSH6FE83F9B853E00F7BD17260001DCF910_0001B0D00068F71D5887F2726CFD997A28E0ED57ABDACDA64934730A24A31583',
                'nonce'                     => 'd6358e06',
                'merchantIdentifier'        => '41B8000198128F7CC4295E03092BE5E287738FD77EC3238789846AC8EF73FCD8',
                'domainName'                => 'demo.cloudpayments.ru',
                'displayName'               => 'demo.cloudpayments.ru',
                'signature'                 => '308006092a864886f70d010702a0803080020101310f300d06096086480165030402010500308006092a864886f70d0107',
            ],
            'Success' => true,
            'Message' => null,
        ];

        /** @var ApplePayStartSessionResponse $response */
        $response = $this->strategy->prepareRawResponse($raw_response);

        $this->assertTrue($response instanceof ApplePayStartSessionResponse);
        $this->assertSame(true, $response->isSuccess());
        $this->assertSame($raw_response['Model'], $response->getModel()->toArray());

        $this->assertSame('SSH6FE83F9B853E00F7BD17260001DCF910_0001B0D00068F71D5887F2726CFD997A28E0ED57ABDACDA64934730A24A31583',
            $response->getModel()->getMerchantSessionIdentifier());
    }
}
