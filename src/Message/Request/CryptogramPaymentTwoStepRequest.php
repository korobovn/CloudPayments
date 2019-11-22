<?php

declare(strict_types = 1);

namespace Korobovn\CloudPayments\Message\Request;

use Korobovn\CloudPayments\Message\Request\Model\CryptogramPaymentModel;

/**
 * @method CryptogramPaymentModel getModel()
 *
 * @see https://developers.cloudpayments.ru/#oplata-po-kriptogramme
 */
class CryptogramPaymentTwoStepRequest extends CryptogramPaymentOneStepRequest
{
    /** @var string */
    protected $url = '/payments/cards/auth';
}
