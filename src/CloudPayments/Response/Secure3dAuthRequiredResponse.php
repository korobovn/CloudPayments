<?php

namespace Korobovn\CloudPayments\Response;

use Korobovn\CloudPayments\Response\Model\Secure3dAuthRequiredModel;

/**
 * Class Secure3dAuthRequiredResponse.
 *
 * @method Secure3dAuthRequiredModel getModel()
 *
 */
class Secure3dAuthRequiredResponse extends AbstractResponse
{
    /**
     * Secure3dAuthRequiredResponse constructor.
     *
     * @param Secure3dAuthRequiredModel $model
     */
    public function __construct(Secure3dAuthRequiredModel $model)
    {
        parent::__construct($model, false, null, null);
    }
}
