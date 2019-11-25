<?php

declare(strict_types = 1);

namespace Korobovn\CloudPayments\Message\Response;

use Korobovn\CloudPayments\Message\Response\Model\ApplePayStartSessionModel;
use Korobovn\CloudPayments\Message\Response\Model\ModelInterface;

/**
 * @method ApplePayStartSessionModel getModel()
 *
 * @see https://developers.cloudpayments.ru/#zapusk-sessii-dlya-oplaty-cherez-apple-pay
 */
class ApplePayStartSessionResponse extends AbstractResponse
{
    /**
     * {@inheritDoc}
     */
    public function createModel(): ModelInterface
    {
        return new ApplePayStartSessionModel;
    }
}
