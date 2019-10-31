<?php

namespace Korobovn\CloudPayments\Message\Request\Model;

use Korobovn\CloudPayments\Message\Traits\ModelField\ValidationUrlString;

/**
 *
 * @see https://developers.cloudpayments.ru/#zapusk-sessii-dlya-oplaty-cherez-apple-pay
 */
class ApplePayStartSessionModel extends AbstractModel
{
    use ValidationUrlString;

    /**
     *
     * @param string $validation_url
     */
    public function __construct(string $validation_url)
    {
        $this->setValidationUrl($validation_url);
    }
}
