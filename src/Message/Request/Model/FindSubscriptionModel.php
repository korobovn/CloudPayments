<?php

declare(strict_types = 1);

namespace Korobovn\CloudPayments\Message\Request\Model;

use Korobovn\CloudPayments\Message\Traits\ModelField\AccountIdString;

/**
 * @see https://developers.cloudpayments.ru/#poisk-podpisok
 */
class FindSubscriptionModel extends AbstractModel
{
    use AccountIdString;

    /**
     * {@inheritDoc}
     */
    public function toArray(): array
    {
        return [
            'AccountId' => $this->getAccountId(),
        ];
    }
}
