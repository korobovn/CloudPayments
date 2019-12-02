<?php

declare(strict_types = 1);

namespace Korobovn\CloudPayments\Message\Request\Model;

use Korobovn\CloudPayments\Message\Traits\ModelField\TransactionIdInt;

/**
 * @see https://developers.cloudpayments.ru/#otmena-oplaty
 */
class CancelPaymentModel extends AbstractModel
{
    use TransactionIdInt;

    /**
     * {@inheritDoc}
     */
    public function toArray(): array
    {
        return [
            'TransactionId' => $this->getTransactionId(),
        ];
    }
}
