<?php

declare(strict_types = 1);

namespace Korobovn\CloudPayments\Message\Request\Model;

use Korobovn\CloudPayments\Message\Traits\ModelField\IdString;

/**
 * @see https://developers.cloudpayments.ru/#otmena-podpiski-na-rekurrentnye-platezhi
 */
class CancelSubscriptionModel extends AbstractModel
{
    use IdString;

    /**
     * {@inheritDoc}
     */
    public function toArray(): array
    {
        return [
            'Id' => $this->getId(),
        ];
    }
}
