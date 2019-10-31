<?php

namespace Korobovn\CloudPayments\Message\Strategy;

use Korobovn\CloudPayments\Message\Response\InvalidRequestResponse;
use Korobovn\CloudPayments\Message\Response\ResponseInterface;
use Korobovn\CloudPayments\Message\Strategy\Specification\InvalidRequestSpecification;
use Korobovn\CloudPayments\Message\Strategy\Specification\IsMerchantSessionIdentifierSpecification;

/**
 *
 * @see https://developers.cloudpayments.ru/#zapusk-sessii-dlya-oplaty-cherez-apple-pay
 */
class ApplePayStartSessionStrategy extends AbstractStrategy
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
        } elseif ((new IsMerchantSessionIdentifierSpecification)->isSatisfiedBy($raw_response)) {
           // $response = new TokenTransactionRejectedResponse;
        } else {
            throw $this->throwCannotCreateResponseException($raw_response);
        }

        $response->fillFromArray($raw_response);

        return $response;
    }
}
