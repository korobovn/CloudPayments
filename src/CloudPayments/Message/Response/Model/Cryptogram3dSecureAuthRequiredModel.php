<?php

namespace Korobovn\CloudPayments\Message\Response\Model;

use Korobovn\CloudPayments\Message\Traits\ModelField\AcsUrlString;
use Korobovn\CloudPayments\Message\Traits\ModelField\PaReqString;
use Korobovn\CloudPayments\Message\Traits\ModelField\TransactionIdInt;

/**
 *
 * @see https://developers.cloudpayments.ru/#oplata-po-kriptogramme
 */
class Cryptogram3dSecureAuthRequiredModel implements ModelInterface
{
    use TransactionIdInt,
        PaReqString,
        AcsUrlString;

    /**
     *
     * @param int    $transaction_id
     * @param string $pa_req
     * @param string $acs_url
     */
    public function __construct(int $transaction_id,
                                string $pa_req,
                                string $acs_url)
    {
        $this->setTransactionId($transaction_id)
            ->setPaReq($pa_req)
            ->setAcsUrl($acs_url);
    }

    public function toArray(): array
    {
        return [
            'TransactionId' => $this->getTransactionId(),
            'PaReq'         => $this->getPaReq(),
            'AcsUrl'        => $this->getAcsUrl(),
        ];
    }
}
