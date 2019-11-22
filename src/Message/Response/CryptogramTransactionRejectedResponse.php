<?php

declare(strict_types = 1);

namespace Korobovn\CloudPayments\Message\Response;

use Korobovn\CloudPayments\Message\Response\Model\CryptogramTransactionRejectedModel;

/**
 * @method CryptogramTransactionRejectedModel getModel()
 *
 * @see https://developers.cloudpayments.ru/#oplata-po-kriptogramme
 */
class CryptogramTransactionRejectedResponse extends AbstractResponse
{
    public function __construct()
    {
        $this->model = new CryptogramTransactionRejectedModel;
    }
}
