<?php

declare(strict_types = 1);

namespace Korobovn\CloudPayments\Message\Request\Model;

use Korobovn\CloudPayments\Message\Traits\ModelField\IdString;

/**
 * @see https://developers.cloudpayments.ru/#zapros-informatsii-o-podpiske
 */
class GetSubscriptionModel extends AbstractModel
{
    use IdString;
}
