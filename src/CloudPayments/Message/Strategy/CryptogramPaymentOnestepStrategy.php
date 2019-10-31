<?php

namespace Korobovn\CloudPayments\Message\Strategy;

use Korobovn\CloudPayments\Message\Request\CryptogramPaymentOnestepRequest;
use Korobovn\CloudPayments\Message\Strategy\Exception\RequestManagementStrategyCannotCreateResponseException;
use Korobovn\CloudPayments\Message\Strategy\Specification\IsAcsUrlInModelSpecification;
use Korobovn\CloudPayments\Message\Strategy\Specification\IsMessageSpecification;
use Korobovn\CloudPayments\Message\Strategy\Specification\IsReasonCodeInModelSpecification;
use Korobovn\CloudPayments\Message\Strategy\Specification\IsSuccessSpecification;
use Korobovn\CloudPayments\Message\Strategy\Specification\NotMessageSpecification;
use Korobovn\CloudPayments\Message\Strategy\Specification\NotModelSpecification;
use Korobovn\CloudPayments\Message\Strategy\Specification\NotSuccessSpecification;
use Korobovn\CloudPayments\Message\Strategy\Specification\ZeroReasonCodeInModelSpecification;
use Korobovn\CloudPayments\Message\Response\InvalidRequestResponse;
use Korobovn\CloudPayments\Message\Response\Model\Cryptogram3dSecureAuthRequiredModel;
use Korobovn\CloudPayments\Message\Response\Model\CryptogramTransactionAcceptedModel;
use Korobovn\CloudPayments\Message\Response\Model\CryptogramTransactionRejectedModel;
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
     * @param array $response
     *
     * @return ResponseInterface
     * @throws RequestManagementStrategyCannotCreateResponseException
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
            $response_interface = new Cryptogram3dSecureAuthRequiredResponse(new Cryptogram3dSecureAuthRequiredModel(
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
            $response_interface = new CryptogramTransactionRejectedResponse(new CryptogramTransactionRejectedModel(
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
            $response_interface = new CryptogramTransactionAcceptedResponse(new CryptogramTransactionAcceptedModel(
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
            throw $this->throwCannotCreateResponseException($response);
        }

        return $response_interface;
    }
}
