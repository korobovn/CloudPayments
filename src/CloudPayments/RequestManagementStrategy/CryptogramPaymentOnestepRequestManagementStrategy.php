<?php

namespace Korobovn\CloudPayments\RequestManagementStrategy;

use Korobovn\CloudPayments\Request\CryptogramPaymentOnestepRequest;
use Korobovn\CloudPayments\RequestManagementStrategy\Exception\RequestManagementStrategyCannotCreateResponse;
use Korobovn\CloudPayments\RequestManagementStrategy\Specification\IsAcsUrlInModelSpecification;
use Korobovn\CloudPayments\RequestManagementStrategy\Specification\IsMessageSpecification;
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

class CryptogramPaymentOnestepRequestManagementStrategy extends AbstractRequestManagementStrategy
{
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
        if ((new NotModelSpecification)
            ->and(new NotSuccessSpecification)
            ->and(new IsMessageSpecification)
            ->isSatisfiedBy($response)
        ) {
            $response_interface = new InvalidRequestResponse($response['Message']);
        } elseif ((new IsAcsUrlInModelSpecification)
            ->and(new NotSuccessSpecification)
            ->and(new NotMessageSpecification)
            ->isSatisfiedBy($response)
        ) {
            $model              = $response['Model'];
            $response_interface = new Secure3dAuthRequiredResponse(new Secure3dAuthRequiredModel(
                $model['TransactionId'],
                $model['PaReq'],
                $model['AcsUrl']
            ));
        } elseif ((new IsReasonCodeInModelSpecification)
            ->and(new NotSuccessSpecification)
            ->and(new NotMessageSpecification)
            ->isSatisfiedBy($response)
        ) {
            $model              = $response['Model'];
            $response_interface = new TransactionRejectedResponse(new TransactionRejectedModel(
                $model['TransactionId'],
                $model['Amount'],
                $model['Currency'],
                $model['CurrencyCode'],
                $model['PaymentAmount'],
                $model['PaymentCurrency'],
                $model['PaymentCurrencyCode'],
                $model['InvoiceId'],
                $model['AccountId'],
                $model['Email'],
                $model['Description'],
                $model['JsonData'],
                $model['CreatedDate'],
                $model['CreatedDateIso'],
                $model['TestMode'],
                $model['IpAddress'],
                $model['IpCountry'],
                $model['IpCity'],
                $model['IpRegion'],
                $model['IpDistrict'],
                $model['IpLatitude'],
                $model['IpLongitude'],
                $model['CardFirstSix'],
                $model['CardLastFour'],
                $model['CardExpDate'],
                $model['CardType'],
                $model['CardTypeCode'],
                $model['Issuer'],
                $model['IssuerBankCountry'],
                $model['Status'],
                $model['StatusCode'],
                $model['Reason'],
                $model['ReasonCode'],
                $model['CardHolderMessage'],
                $model['Name']
            ));
        } elseif ((new ZeroReasonCodeInModelSpecification)
            ->and(new IsSuccessSpecification)
            ->and(new NotMessageSpecification)
            ->isSatisfiedBy($response)
        ) {
            $model              = $response['Model'];
            $response_interface = new TransactionAcceptedResponse(new TransactionAcceptedModel(
                $model['TransactionId'],
                $model['Amount'],
                $model['Currency'],
                $model['CurrencyCode'],
                $model['InvoiceId'],
                $model['AccountId'],
                $model['Email'],
                $model['Description'],
                $model['JsonData'],
                $model['CreatedDate'],
                $model['CreatedDateIso'],
                $model['AuthDate'],
                $model['AuthDateIso'],
                $model['ConfirmDate'],
                $model['ConfirmDateIso'],
                $model['AuthCode'],
                $model['TestMode'],
                $model['IpAddress'],
                $model['IpCountry'],
                $model['IpCity'],
                $model['IpRegion'],
                $model['IpDistrict'],
                $model['IpLatitude'],
                $model['IpLongitude'],
                $model['CardFirstSix'],
                $model['CardLastFour'],
                $model['CardExpDate'],
                $model['CardType'],
                $model['CardTypeCode'],
                $model['Issuer'],
                $model['IssuerBankCountry'],
                $model['Status'],
                $model['StatusCode'],
                $model['Reason'],
                $model['ReasonCode'],
                $model['CardHolderMessage'],
                $model['Name'],
                $model['Token']
            ));
        } else {
            throw new RequestManagementStrategyCannotCreateResponse('Request management strategy cannot create a response');
        }

        return $response_interface;
    }
}
