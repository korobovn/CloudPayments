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

    /**
     *
     * @param int    $transaction_id
     * @param string $pa_res
     */
    public function __construct(int $transaction_id, string $pa_res)
    {
        $this->setTransactionId($transaction_id)
            ->setPaRes($pa_res);
    }
}
