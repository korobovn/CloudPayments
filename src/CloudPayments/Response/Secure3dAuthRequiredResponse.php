<?php

namespace Korobovn\CloudPayments\Response;

use Korobovn\CloudPayments\Response\Model\Secure3dAuthRequiredModel;

class Secure3dAuthRequiredResponse extends AbstractResponse
{
    /** @var Secure3dAuthRequiredModel */
    protected $model;

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
