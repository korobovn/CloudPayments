<?php

namespace Korobovn\Tests\Unit\Message\Strategy;

use Korobovn\CloudPayments\Message\Response\InvalidRequestResponse;
use Korobovn\CloudPayments\Message\Strategy\AbstractStrategy;
use Korobovn\CloudPayments\Message\Strategy\Specification\InvalidRequestSpecification;
use Korobovn\CloudPayments\Message\Strategy\StrategyInterface;
use PHPUnit\Framework\TestCase;

class BaseStrategyTest extends TestCase
{
    /** @var StrategyInterface */
    protected $strategy;

    protected $specification;

    protected function setUp()
    {
        parent::setUp();

        $this->strategy = new class extends AbstractStrategy
        {
            protected $specifications = [
                InvalidRequestSpecification::class => InvalidRequestResponse::class,
            ];
        };
    }

    public function test()
    {

    }
}
