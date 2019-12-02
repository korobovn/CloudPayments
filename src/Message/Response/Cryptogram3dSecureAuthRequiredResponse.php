<?php

declare(strict_types = 1);

namespace Korobovn\CloudPayments\Message\Response;

use Korobovn\CloudPayments\Message\Response\Model\Cryptogram3dSecureAuthRequiredModel;
use Korobovn\CloudPayments\Message\Response\Model\ModelInterface;

/**
 * @method Cryptogram3dSecureAuthRequiredModel getModel()
 *
 * @see https://developers.cloudpayments.ru/#oplata-po-kriptogramme
 */
class Cryptogram3dSecureAuthRequiredResponse extends AbstractResponse
{
    /**
     * {@inheritDoc}
     */
    public function createModel(): ModelInterface
    {
        return new Cryptogram3dSecureAuthRequiredModel;
    }
}
