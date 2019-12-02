<?php

declare(strict_types = 1);

namespace Korobovn\CloudPayments\Message\Request\Model;

use Korobovn\CloudPayments\Message\Traits\ModelField\ValidationUrlString;

/**
 * @see https://developers.cloudpayments.ru/#zapusk-sessii-dlya-oplaty-cherez-apple-pay
 */
class ApplePayStartSessionModel extends AbstractModel
{
    use ValidationUrlString;

    /**
     * {@inheritDoc}
     */
    public function toArray(): array
    {
        return [
            'ValidationUrl' => $this->getValidationUrl(),
        ];
    }
}
