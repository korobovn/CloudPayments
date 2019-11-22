<?php

declare(strict_types = 1);

namespace Korobovn\Tests;

use Illuminate\Foundation\Testing\TestCase;
use Korobovn\CloudPayments\CloudPaymentsServiceProvider;
use Korobovn\Tests\Traits\CreatesApplicationTrait;

abstract class AbstractTestCase extends TestCase
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
