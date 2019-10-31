<?php

namespace Korobovn\CloudPayments\Message\Strategy;

use Korobovn\CloudPayments\Message\Strategy\Specification\InvalidRequestSpecification;
use Korobovn\CloudPayments\Message\Strategy\Specification\TransactionAcceptedSpecification;
use Korobovn\CloudPayments\Message\Strategy\Specification\TransactionRejectedSpecification;
use Korobovn\CloudPayments\Message\Response\TokenTransactionAcceptedResponse;
use Korobovn\CloudPayments\Message\Response\TokenTransactionRejectedResponse;
use Korobovn\CloudPayments\Message\Response\InvalidRequestResponse;
use Korobovn\CloudPayments\Message\Response\ResponseInterface;

/**
 *
 * @see https://developers.cloudpayments.ru/#oplata-po-tokenu-rekarring
 */
class TokenPaymentStrategy extends AbstractStrategy
{
    /**
     * @param array $raw_response
     *
     * @return ResponseInterface
     * @throws Exception\RequestManagementStrategyCannotCreateResponseException
     */
    public function prepareRawResponse(array $raw_response): ResponseInterface
    {
        if ((new InvalidRequestSpecification)->isSatisfiedBy($raw_response)) {
            $response = new InvalidRequestResponse;
        } elseif ((new TransactionRejectedSpecification)->isSatisfiedBy($raw_response)) {
            $response = new TokenTransactionRejectedResponse;
        } elseif ((new TransactionAcceptedSpecification)->isSatisfiedBy($raw_response)) {
            $response = new TokenTransactionAcceptedResponse;
        } else {
            throw $this->throwCannotCreateResponseException($raw_response);
        }

        $response->fillFromArray($raw_response);

        return $response;
    }
}
