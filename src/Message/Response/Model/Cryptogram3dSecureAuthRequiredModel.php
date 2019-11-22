<?php

declare(strict_types = 1);

namespace Korobovn\CloudPayments\Message\Response\Model;

use Korobovn\CloudPayments\Message\Traits\ModelField\PaReqString;
use Korobovn\CloudPayments\Message\Traits\ModelField\AcsUrlString;
use Korobovn\CloudPayments\Message\Traits\ModelField\TransactionIdInt;

/**
 * @see https://developers.cloudpayments.ru/#oplata-po-kriptogramme
 */
class Cryptogram3dSecureAuthRequiredModel extends AbstractModel
{
    use TransactionIdInt,
        PaReqString,
        AcsUrlString;
}
