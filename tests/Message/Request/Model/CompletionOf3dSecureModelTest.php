<?php

namespace Korobovn\Tests\Message\Request\Model;

use Korobovn\CloudPayments\Message\Request\Model\CompletionOf3dSecureModel;
use PHPUnit\Framework\TestCase;

/**
 * @see https://developers.cloudpayments.ru/#obrabotka-3-d-secure
 */
class CompletionOf3dSecureModelTest extends TestCase
{
    public function test()
    {
        new CompletionOf3dSecureModel(
            504,
            'dsdsdsd'

        );
        $this->assertTrue(true);
    }
}
