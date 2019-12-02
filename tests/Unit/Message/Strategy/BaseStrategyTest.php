<?php

declare(strict_types = 1);

namespace Korobovn\Tests\Unit\Message\Strategy;

use Korobovn\CloudPayments\Message\Response\InvalidRequestResponse;
use Korobovn\CloudPayments\Message\Response\ResponseInterface;
use Korobovn\CloudPayments\Message\Strategy\AbstractStrategy;
use Korobovn\CloudPayments\Message\Strategy\Exception\ClassNotFoundException;
use Korobovn\CloudPayments\Message\Strategy\Exception\IsNotInstanceOfException;
use Korobovn\CloudPayments\Message\Strategy\Exception\StrategyCannotCreateResponseException;
use Korobovn\CloudPayments\Message\Strategy\Specification\InvalidRequestSpecification;
use Korobovn\CloudPayments\Message\Strategy\Specification\SpecificationInterface;
use PHPUnit\Framework\TestCase;

/**
 * @group unit
 * @group  base-strategy
 * @covers \Korobovn\CloudPayments\Message\Strategy\AbstractStrategy
 */
class BaseStrategyTest extends TestCase
{
    public function testSuccessPrepare()
    {
        $strategy = new class extends AbstractStrategy
        {
            protected $specifications = [
                InvalidRequestSpecification::class => InvalidRequestResponse::class,
            ];
        };

        $response = $strategy->prepareRawResponse(['Success' => false, 'Message' => 'Error']);

        $this->assertInstanceOf(InvalidRequestResponse::class, $response);
    }

    public function testClassNotFoundExceptionForSpecification()
    {
        $this->expectException(ClassNotFoundException::class);
        $this->expectExceptionMessage('The class not-found-class is not found');

        $strategy = new class extends AbstractStrategy
        {
            protected $specifications = [
                'not-found-class' => InvalidRequestResponse::class,
            ];
        };

        $strategy->prepareRawResponse(['Success' => false, 'Message' => 'Error']);
    }

    public function testClassNotFoundExceptionForResponse()
    {
        $this->expectException(ClassNotFoundException::class);
        $this->expectExceptionMessage('The class not-found-class is not found');

        $strategy = new class extends AbstractStrategy
        {
            protected $specifications = [
                InvalidRequestSpecification::class => 'not-found-class',
            ];
        };

        $strategy->prepareRawResponse(['Success' => false, 'Message' => 'Error']);
    }

    public function testIsNotInstanceOfSpecificationInterface()
    {
        $this->expectException(IsNotInstanceOfException::class);
        $this->expectExceptionMessage(sprintf(
            'The class %s is not an instance of %s',
            InvalidRequestResponse::class, SpecificationInterface::class
        ));

        $strategy = new class extends AbstractStrategy
        {
            protected $specifications = [
                InvalidRequestResponse::class => InvalidRequestResponse::class,
            ];
        };

        $strategy->prepareRawResponse(['Success' => false, 'Message' => 'Error']);
    }

    public function testIsNotInstanceOfResponseInterface()
    {
        $this->expectException(IsNotInstanceOfException::class);
        $this->expectExceptionMessage(sprintf(
            'The class %s is not an instance of %s',
            InvalidRequestSpecification::class, ResponseInterface::class
        ));

        $strategy = new class extends AbstractStrategy
        {
            protected $specifications = [
                InvalidRequestSpecification::class => InvalidRequestSpecification::class,
            ];
        };

        $strategy->prepareRawResponse(['Success' => false, 'Message' => 'Error']);
    }

    public function testCannotCreateResponseException()
    {
        $this->expectException(StrategyCannotCreateResponseException::class);

        $strategy = new class extends AbstractStrategy
        {
            protected $specifications = [
                InvalidRequestSpecification::class => InvalidRequestResponse::class,
            ];
        };

        $strategy->prepareRawResponse(['Success' => true]);
    }
}
