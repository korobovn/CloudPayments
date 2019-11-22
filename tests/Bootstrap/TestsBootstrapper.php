<?php

declare(strict_types = 1);

namespace Korobovn\Tests\Bootstrap;

use Illuminate\Contracts\Console\Kernel;

class TestsBootstrapper extends AbstractTestsBootstrapper
{
    /**
     * Stub bootstrap method.
     *
     * @return bool
     */
    protected function bootSomething()
    {
        return true;
    }
}
