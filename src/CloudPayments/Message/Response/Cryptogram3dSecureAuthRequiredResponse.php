<?php

namespace Korobovn\CloudPayments\Message\Response;

use Korobovn\CloudPayments\Message\Response\Model\Cryptogram3dSecureAuthRequiredModel;

/**
 *
 * @method Cryptogram3dSecureAuthRequiredModel getModel()
 *
 * @see https://developers.cloudpayments.ru/#oplata-po-kriptogramme
 */
class Cryptogram3dSecureAuthRequiredResponse extends AbstractResponse
{
    /**
     * Cryptogram3dSecureAuthRequiredResponse constructor.
     *
     * @param Cryptogram3dSecureAuthRequiredModel $model
     */
    public function __construct(Cryptogram3dSecureAuthRequiredModel $model)
    {
        parent::__construct($model, false, null, null);
    }
}
