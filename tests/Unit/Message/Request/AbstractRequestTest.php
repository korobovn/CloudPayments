<?php

namespace Korobovn\Tests\Unit\Message\Request;

use Korobovn\CloudPayments\Client\CloudPaymentClientInterface;
use Korobovn\CloudPayments\Message\Request\AbstractRequest;
use Korobovn\CloudPayments\Message\Request\Model\NullModel;
use Korobovn\CloudPayments\Message\Request\RequestInterface;
use Korobovn\CloudPayments\Message\Strategy\SuccessStrategy;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

/**
 * @group  unit
 * @group  abstract-request
 * @covers \Korobovn\CloudPayments\Message\Request\AbstractRequest
 */
class AbstractRequestTest extends TestCase
{
    /** @var RequestInterface */
    protected $request;

    protected function setUp(): void
    {
        parent::setUp();

        $this->request = new class extends AbstractRequest
        {
            protected $url    = '/test';

            protected $method = 'POST';

            public function __construct()
            {
                $this->model    = new NullModel;
                $this->strategy = new SuccessStrategy;
            }
        };
    }

    public function test()
    {
        $this->assertSame('https://api.cloudpayments.ru/test', $this->request->getUrl());
        $this->assertSame('POST', $this->request->getMethod());
        $this->assertSame('[]', $this->request->getBody());
        $this->assertSame(['Content-Type' => 'application/json'], $this->request->getHeaders());
        $this->assertInstanceOf(NullModel::class, $this->request->getModel());
        $this->assertInstanceOf(SuccessStrategy::class, $this->request->getStrategy());
    }

    public function testSend()
    {
        /** @var CloudPaymentClientInterface|MockObject $client */
        $client = $this->createMock(CloudPaymentClientInterface::class);

        $client->expects($this->once())
            ->method('send');

        $this->request
            ->setClient($client)
            ->send();
    }
}
