<?php

namespace Korobovn\CloudPayments\Message\Strategy;

use Korobovn\CloudPayments\Message\Request\CryptogramPaymentOnestepRequest;
use Korobovn\CloudPayments\Message\Strategy\Exception\RequestManagementStrategyCannotCreateResponseException;
use Korobovn\CloudPayments\Message\Strategy\Specification\InvalidRequestSpecification;
use Korobovn\CloudPayments\Message\Strategy\Specification\IsAcsUrlInModelSpecification;
use Korobovn\CloudPayments\Message\Strategy\Specification\NotMessageSpecification;
use Korobovn\CloudPayments\Message\Strategy\Specification\NotSuccessSpecification;
use Korobovn\CloudPayments\Message\Strategy\Specification\TransactionAcceptedSpecification;
use Korobovn\CloudPayments\Message\Strategy\Specification\TransactionRejectedSpecification;
use Korobovn\CloudPayments\Message\Response\InvalidRequestResponse;
use Korobovn\CloudPayments\Message\Response\ResponseInterface;
use Korobovn\CloudPayments\Message\Response\Cryptogram3dSecureAuthRequiredResponse;
use Korobovn\CloudPayments\Message\Response\CryptogramTransactionAcceptedResponse;
use Korobovn\CloudPayments\Message\Response\CryptogramTransactionRejectedResponse;

/**
 *
 * @see https://developers.cloudpayments.ru/#oplata-po-kriptogramme
 */
class CryptogramPaymentOnestepStrategy extends AbstractStrategy
{
    /**
     *
     * @param CryptogramPaymentOnestepRequest $request
     */
    public function __construct(CryptogramPaymentOnestepRequest $request)
    {
        parent::__construct($request);
    }

    /**
     * @param array $raw_response
     *
     * @return ResponseInterface
     * @throws RequestManagementStrategyCannotCreateResponseException
     */
    public function prepareRawResponse(array $raw_response): ResponseInterface
    {
        if ((new InvalidRequestSpecification)->isSatisfiedBy($raw_response)) {
            $response = new InvalidRequestResponse;
            $response->createFromArray($raw_response);
        } elseif ((new IsAcsUrlInModelSpecification)
            ->and(new NotSuccessSpecification)
            ->and(new NotMessageSpecification)
            ->isSatisfiedBy($raw_response)
        ) {
            $response = new Cryptogram3dSecureAuthRequiredResponse;
        } elseif ((new TransactionRejectedSpecification)->isSatisfiedBy($raw_response)) {
            $response = new CryptogramTransactionRejectedResponse;
        } elseif ((new TransactionAcceptedSpecification)->isSatisfiedBy($raw_response)) {
            $response = new CryptogramTransactionAcceptedResponse;
        } else {
            throw $this->throwCannotCreateResponseException($raw_response);
        }

        $response->createFromArray($raw_response);

        return $response;
    }
}
