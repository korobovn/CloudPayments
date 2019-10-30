<?php

namespace Korobovn\CloudPayments\Request\Model;

use Korobovn\CloudPayments\ModelFieldTrait\PaResString;
use Korobovn\CloudPayments\ModelFieldTrait\TransactionIdInt;

/**
 * Class CompletionOf3dSecureModel.
 *
 * @see https://developers.cloudpayments.ru/#obrabotka-3-d-secure
 */
class CompletionOf3dSecureModel implements ModelInterface
{
    use TransactionIdInt,
        PaResString;

    /**
     * CompletionOf3dSecureModel constructor.
     *
     * @param int    $transaction_id
     * @param string $pa_res
     */
    public function __construct(int $transaction_id, string $pa_res)
    {
        $this->setTransactionId($transaction_id)
            ->setPaRes($pa_res);
    }

    public function toArray(): array
    {
        return [
            'TransactionId' => $this->getTransactionId(),
            'PaRes'         => $this->getPaRes(),
        ];
    }
}
