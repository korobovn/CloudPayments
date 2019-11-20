<?php

namespace Korobovn\Tests\Unit\Message\Strategy\Specification;

use Korobovn\CloudPayments\Message\Strategy\Specification\SubscriptionsInModelSpecification;
use PHPUnit\Framework\TestCase;

/**
 * @group  unit
 * @group  subscriptions-in-model-specification
 * @covers \Korobovn\CloudPayments\Message\Strategy\Specification\SubscriptionsInModelSpecification
 */
class SubscriptionsInModelSpecificationTest extends TestCase
{
    /** @var SubscriptionsInModelSpecification */
    protected $specification;

    protected function setUp(): void
    {
        parent::setUp();
        $this->specification = new SubscriptionsInModelSpecification;
    }

    public function testIsTrue()
    {
        $raw_response = [
            'Model'       => [
                [
                    'Id'                           => 'sc_4bae8f5823bb8cdc966ccd1590a3b',
                    'AccountId'                    => 'user@example.com',
                    'Description'                  => 'Подписка на сервис',
                    'Email'                        => 'user@example.com',
                    'Amount'                       => 1.02,
                    'CurrencyCode'                 => 0,
                    'Currency'                     => 'RUB',
                    'RequireConfirmation'          => false,
                    'StartDate'                    => '/Date(1473665268000)/',
                    'StartDateIso'                 => '2016-09-12T15:27:48',
                    'IntervalCode'                 => 1,
                    'Interval'                     => 'Month',
                    'Period'                       => 1,
                    'MaxPeriods'                   => null,
                    'CultureName'                  => 'ru',
                    'StatusCode'                   => 0,
                    'Status'                       => 'Active',
                    'SuccessfulTransactionsNumber' => 0,
                    'FailedTransactionsNumber'     => 0,
                    'LastTransactionDate'          => null,
                    'LastTransactionDateIso'       => null,
                    'NextTransactionDate'          => '/Date(1473665268000)/',
                    'NextTransactionDateIso'       => '2016-09-12T15:27:48',
                ],
                [
                    'Id'                           => 'sc_b4bdedba0e2bdf279be2e0bab9c99',
                    'AccountId'                    => 'user@example.com',
                    'Description'                  => 'Подписка на сервис',
                    'Email'                        => 'user@example.com',
                    'Amount'                       => 3.04,
                    'CurrencyCode'                 => 0,
                    'Currency'                     => 'RUB',
                    'RequireConfirmation'          => false,
                    'StartDate'                    => '/Date(1473665268000)/',
                    'StartDateIso'                 => '2016-09-12T15:27:48',
                    'IntervalCode'                 => 0,
                    'Interval'                     => 'Week',
                    'Period'                       => 2,
                    'MaxPeriods'                   => null,
                    'CultureName'                  => 'ru',
                    'StatusCode'                   => 0,
                    'Status'                       => 'Active',
                    'SuccessfulTransactionsNumber' => 0,
                    'FailedTransactionsNumber'     => 0,
                    'LastTransactionDate'          => null,
                    'LastTransactionDateIso'       => null,
                    'NextTransactionDate'          => '/Date(1473665268000)/',
                    'NextTransactionDateIso'       => '2016-09-12T15:27:48',
                ],
            ],
        ];

        $this->assertTrue($this->specification->isSatisfiedBy($raw_response));
    }

    public function testIsFalse()
    {
        $raw_response = [
            'Model'       => [
                'Id'                           => 'sc_4bae8f5823bb8cdc966ccd1590a3b',
                'AccountId'                    => 'user@example.com',
                'Description'                  => 'Подписка на сервис',
                'Email'                        => 'user@example.com',
                'Amount'                       => 1.02,
                'CurrencyCode'                 => 0,
                'Currency'                     => 'RUB',
                'RequireConfirmation'          => false,
                'StartDate'                    => '/Date(1473665268000)/',
                'StartDateIso'                 => '2016-09-12T15:27:48',
                'IntervalCode'                 => 1,
                'Interval'                     => 'Month',
                'Period'                       => 1,
                'MaxPeriods'                   => null,
                'CultureName'                  => 'ru',
                'StatusCode'                   => 0,
                'Status'                       => 'Active',
                'SuccessfulTransactionsNumber' => 0,
                'FailedTransactionsNumber'     => 0,
                'LastTransactionDate'          => null,
                'LastTransactionDateIso'       => null,
                'NextTransactionDate'          => '/Date(1473665268000)/',
                'NextTransactionDateIso'       => '2016-09-12T15:27:48',
            ],
        ];

        $this->assertFalse($this->specification->isSatisfiedBy($raw_response));
    }

    public function testIsNotArray()
    {
        $raw_response = [
            'Model'       => null,
        ];

        $this->assertFalse($this->specification->isSatisfiedBy($raw_response));
    }
}
