<?php

namespace Korobovn\Tests\Unit\Message\Strategy\Specification;

use Korobovn\CloudPayments\Message\Strategy\Specification\ApplePayStartSessionCorrectSpecification;
use PHPUnit\Framework\TestCase;

/**
 * @group unit
 * @group apple-pay-start-session-correct-specification
 * @covers \Korobovn\CloudPayments\Message\Strategy\Specification\ApplePayStartSessionCorrectSpecification
 */
class ApplePayStartSessionCorrectSpecificationTest extends TestCase
{
    /** @var ApplePayStartSessionCorrectSpecification */
    protected $specification;

    protected function setUp(): void
    {
        parent::setUp();
        $this->specification = new ApplePayStartSessionCorrectSpecification;
    }

    public function testIsTrue()
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

        $this->assertTrue($this->specification->isSatisfiedBy($raw_response));
    }
}
