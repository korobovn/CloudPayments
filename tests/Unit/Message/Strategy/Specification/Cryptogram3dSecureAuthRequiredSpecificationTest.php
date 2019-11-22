<?php

declare(strict_types = 1);

namespace Korobovn\Tests\Unit\Message\Strategy\Specification;

use Korobovn\CloudPayments\Message\Strategy\Specification\Cryptogram3dSecureAuthRequiredSpecification;
use PHPUnit\Framework\TestCase;

/**
 * @group  unit
 * @group  cryptogram-3d-secure-auth-required-specification
 * @covers \Korobovn\CloudPayments\Message\Strategy\Specification\Cryptogram3dSecureAuthRequiredSpecification
 */
class Cryptogram3dSecureAuthRequiredSpecificationTest extends TestCase
{
    /** @var Cryptogram3dSecureAuthRequiredSpecification */
    protected $specification;

    protected function setUp(): void
    {
        parent::setUp();
        $this->specification = new Cryptogram3dSecureAuthRequiredSpecification;
    }

    public function testIsTrue()
    {
        $raw_response = [
            'Model'   => [
                'TransactionId' => 504,
                'PaReq'         => 'RXDe9mLgo0Z1nhpU9PQasWmPhLYAKksuEChfn13uVR9mGTO7MzZM2dg3qSn0Q',
                'AcsUrl'        => 'https://test.paymentgate.ru/acs/auth/start.do',

            ],
            'Success' => false,
            'Message' => null,
        ];

        $this->assertTrue($this->specification->isSatisfiedBy($raw_response));
    }
}
