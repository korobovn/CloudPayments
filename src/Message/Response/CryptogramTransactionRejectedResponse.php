<?php

declare(strict_types = 1);

namespace Korobovn\CloudPayments\Message\Response;

use Korobovn\CloudPayments\Message\Response\Model\CryptogramTransactionRejectedModel;
use Korobovn\CloudPayments\Message\Response\Model\ModelInterface;

/**
 * @method CryptogramTransactionRejectedModel getModel()
 *
 * @see https://developers.cloudpayments.ru/#oplata-po-kriptogramme
 */
class CryptogramTransactionRejectedResponse extends AbstractResponse
{
    /**
     * {@inheritDoc}
     */
    public function createModel(): ModelInterface
    {
        return new CryptogramTransactionRejectedModel;
    }
}
