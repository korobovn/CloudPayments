<?php

namespace Korobovn\CloudPayments\Message\Request;

use Korobovn\CloudPayments\Message\Request\Model\CompletionOf3dSecureModel;
use Korobovn\CloudPayments\Message\Strategy\StrategyInterface;

/**
 *
 * @method CompletionOf3dSecureModel getModel()
 *
 * @see https://developers.cloudpayments.ru/#obrabotka-3-d-secure
 */
class CompletionOf3dSecureRequest extends AbstractRequest
{
    /** @var string */
    protected $url = '/payments/cards/post3ds';

    public function __construct(CompletionOf3dSecureModel $model, StrategyInterface $strategy = null)
    {


        parent::__construct($model, $strategy);
    }
}
