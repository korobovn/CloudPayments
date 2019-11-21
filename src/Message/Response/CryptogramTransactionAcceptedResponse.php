<?php

namespace Korobovn\CloudPayments\Message\Response;

use Korobovn\CloudPayments\Message\Response\Model\CryptogramTransactionAcceptedModel;

/**
 * @method CryptogramTransactionAcceptedModel getModel()
 *
 * @see https://developers.cloudpayments.ru/#oplata-po-kriptogramme
 */
class CryptogramTransactionAcceptedResponse extends AbstractResponse
{
    public function __construct()
    {
        $this->model = new CryptogramTransactionAcceptedModel;
    }
}
