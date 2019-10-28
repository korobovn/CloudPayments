<?php

namespace Korobovn\CloudPayments\RequestManagementStrategy;

use Korobovn\CloudPayments\Request\CryptogramPaymentOnestepRequest;
use Korobovn\CloudPayments\RequestManagementStrategy\Exception\RequestManagementStrategyCannotCreateResponse;
use Korobovn\CloudPayments\RequestManagementStrategy\Specification\IsAcsUrlInModelSpecification;
use Korobovn\CloudPayments\RequestManagementStrategy\Specification\IsMessageSpecification;
use Korobovn\CloudPayments\RequestManagementStrategy\Specification\IsModelSpecification;
use Korobovn\CloudPayments\RequestManagementStrategy\Specification\IsReasonCodeInModelSpecification;
use Korobovn\CloudPayments\RequestManagementStrategy\Specification\IsSuccessSpecification;
use Korobovn\CloudPayments\RequestManagementStrategy\Specification\NotMessageSpecification;
use Korobovn\CloudPayments\RequestManagementStrategy\Specification\NotModelSpecification;
use Korobovn\CloudPayments\RequestManagementStrategy\Specification\NotSuccessSpecification;
use Korobovn\CloudPayments\RequestManagementStrategy\Specification\ZeroReasonCodeInModelSpecification;
use Korobovn\CloudPayments\Response\InvalidRequestResponse;
use Korobovn\CloudPayments\Response\Model\Secure3dAuthRequiredModel;
use Korobovn\CloudPayments\Response\Model\TransactionAcceptedModel;
use Korobovn\CloudPayments\Response\Model\TransactionRejectedModel;
use Korobovn\CloudPayments\Response\ResponseInterface;
use Korobovn\CloudPayments\Response\Secure3dAuthRequiredResponse;
use Korobovn\CloudPayments\Response\TransactionAcceptedResponse;
use Korobovn\CloudPayments\Response\TransactionRejectedResponse;

class CryptogramPaymentOnestepManagementStrategy extends AbstractRequestManagementStrategy
{
    /** @var CryptogramPaymentOnestepRequest */
    protected $request;

    /**
     * CryptogramPaymentOnestepManagementStrategy constructor.
     *
     * @param CryptogramPaymentOnestepRequest $request
     */
    public function __construct(CryptogramPaymentOnestepRequest $request)
    {
        parent::__construct($request);
    }

    /**
     * @param array $response
     *
     * @return ResponseInterface
     * @throws RequestManagementStrategyCannotCreateResponse
     */
    public function prepareRawResponse(array $response): ResponseInterface
    {
        if (
        (new NotModelSpecification)
            ->and(new NotSuccessSpecification)
            ->and(new IsMessageSpecification)
            ->isSatisfiedBy($response)
        ) {
            $response_interface = new InvalidRequestResponse($response['Message']);
        } elseif (
        (new IsAcsUrlInModelSpecification)
            ->and(new NotSuccessSpecification)
            ->and(new NotMessageSpecification)
            ->isSatisfiedBy($response)
        ) {
            $response_interface = new Secure3dAuthRequiredResponse(new Secure3dAuthRequiredModel(
                $response['TransactionId'],
                $response['PaReq'],
                $response['AcsUrl']
            ));
        } elseif (
        (new IsReasonCodeInModelSpecification)
            ->and(new NotSuccessSpecification)
            ->and(new NotMessageSpecification)
            ->isSatisfiedBy($response)
        ) {
            $response_interface = new TransactionRejectedResponse(new TransactionRejectedModel(
                $response['TransactionId'],
                $response['Amount'],
                $response['Currency'],
                $response['CurrencyCode'],
                $response['PaymentAmount'],
                $response['PaymentCurrency'],
                $response['PaymentCurrencyCode'],
                $response['InvoiceId'],
                $response['AccountId'],
                $response['Email'],
                $response['Description']
            ));
        } elseif (
        (new ZeroReasonCodeInModelSpecification)
            ->and(new IsSuccessSpecification)
            ->and(new NotMessageSpecification)
            ->isSatisfiedBy($response)
        ) {
            $response_interface = new TransactionAcceptedResponse(new TransactionAcceptedModel(
                $response['TransactionId'],
                $response['Amount'],
                $response['Currency'],
                $response['CurrencyCode'],
                $response['InvoiceId'],
                $response['AccountId'],
                $response['Email'],
                $response['Description']
            ));
        } else {
            throw new RequestManagementStrategyCannotCreateResponse('Request management strategy cannot create a response');
        }

        return $response_interface;
    }
}
