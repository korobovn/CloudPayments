<?php

namespace Korobovn\Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Korobovn\CloudPayments\CloudPaymentsServiceProvider;
use Korobovn\Tests\Traits\CreatesApplicationTrait;

abstract class AbstractTestCase extends BaseTestCase
{
    use CreatesApplicationTrait;

    /**
     * {@inheritdoc}
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->app->register(CloudPaymentsServiceProvider::class);
    }
}
