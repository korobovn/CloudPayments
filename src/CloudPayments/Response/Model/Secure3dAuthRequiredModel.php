<?php

namespace Korobovn\CloudPayments\Response\Model;

use Korobovn\CloudPayments\ModelFieldTrait\AcsUrlString;
use Korobovn\CloudPayments\ModelFieldTrait\PaReqString;
use Korobovn\CloudPayments\ModelFieldTrait\TransactionIdInt;

class Secure3dAuthRequiredModel implements ModelInterface
{
    use TransactionIdInt,
        PaReqString,
        AcsUrlString;

    /**
     * Secure3dAuthRequiredModel constructor.
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
