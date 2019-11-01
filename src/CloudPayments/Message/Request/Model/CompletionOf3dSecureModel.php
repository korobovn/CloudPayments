<?php

namespace Korobovn\CloudPayments\Message\Request\Model;

use Korobovn\CloudPayments\Message\Traits\ModelField\PaResString;
use Korobovn\CloudPayments\Message\Traits\ModelField\TransactionIdInt;

/**
 *
 * @see https://developers.cloudpayments.ru/#obrabotka-3-d-secure
 */
class CompletionOf3dSecureModel extends AbstractModel
{
    use TransactionIdInt,
        PaResString;
}
