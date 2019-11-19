<?php

namespace Korobovn\Tests\Unit\Message\Request;

use Korobovn\CloudPayments\Message\Request\RequestInterface;
use PHPUnit\Framework\TestCase;

abstract class BaseRequestTest extends TestCase
{
    /** @var RequestInterface */
    protected $request;

    protected function setUp()
    {
        parent::setUp();
        $test_class_name = $this->getTestClassName();
        $this->request   = new $test_class_name;
    }

    public function testGetUrl()
    {
        $this->assertSame($this->getExpectedUrl(), $this->request->getUrl());
    }

    /**
     * @return string
     */
    abstract protected function getTestClassName(): string;

    /**
     * @return string
     */
    abstract protected function getExpectedUrl(): string;
}
