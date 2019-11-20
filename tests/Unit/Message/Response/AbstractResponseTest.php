<?php

namespace Korobovn\Tests\Unit\Message\Response;

use Korobovn\CloudPayments\Message\Response\AbstractResponse;
use Korobovn\CloudPayments\Message\Response\Model\NullModel;
use Korobovn\CloudPayments\Message\Response\ResponseInterface;
use PHPUnit\Framework\TestCase;

/**
 * @group  unit
 * @group  abstract-response
 * @covers \Korobovn\CloudPayments\Message\Response\AbstractResponse
 */
class AbstractResponseTest extends TestCase
{
    /** @var ResponseInterface */
    protected $response;

    protected function setUp(): void
    {
        parent::setUp();

        $this->response = new class extends AbstractResponse
        {
            public function __construct()
            {
                $this->model = new NullModel;
            }
        };
    }

    /**
     * @cover ::fillFromArray
     * @cover ::isSuccess
     * @cover ::getMessage
     * @cover ::getInnerResult
     * @cover ::toArray
     */
    public function test()
    {
        $data = [
            'Model'       => [],
            'Success'     => true,
            'Message'     => 'Message',
            'InnerResult' => 'InnerResult',
        ];

        $this->response->fillFromArray($data);

        $this->assertSame(true, $this->response->isSuccess());
        $this->assertSame('Message', $this->response->getMessage());
        $this->assertSame('InnerResult', $this->response->getInnerResult());
        $this->assertInstanceOf(NullModel::class, $this->response->getModel());

        $this->assertSame(sort($data), sort($this->response->toArray()));
    }
}
