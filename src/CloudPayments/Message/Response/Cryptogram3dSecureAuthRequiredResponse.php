<?php

namespace Korobovn\CloudPayments\Message\Response;

use Korobovn\CloudPayments\Message\Response\Model\Cryptogram3dSecureAuthRequiredModel;

/**
 * @method Cryptogram3dSecureAuthRequiredModel getModel()
 *
 * @see https://developers.cloudpayments.ru/#oplata-po-kriptogramme
 */
class Cryptogram3dSecureAuthRequiredResponse extends AbstractResponse
{
    public function __construct()
    {
        $this->model = new Cryptogram3dSecureAuthRequiredModel;
    }
}
