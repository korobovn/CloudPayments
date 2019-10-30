<?php

namespace Korobovn\CloudPayments\RequestManagementStrategy;

use Korobovn\CloudPayments\Request\TokenPaymentOnestepRequest;
use Korobovn\CloudPayments\RequestManagementStrategy\Specification\IsMessageSpecification;
use Korobovn\CloudPayments\RequestManagementStrategy\Specification\IsReasonCodeInModelSpecification;
use Korobovn\CloudPayments\RequestManagementStrategy\Specification\IsSuccessSpecification;
use Korobovn\CloudPayments\RequestManagementStrategy\Specification\NotMessageSpecification;
use Korobovn\CloudPayments\RequestManagementStrategy\Specification\NotModelSpecification;
use Korobovn\CloudPayments\RequestManagementStrategy\Specification\NotSuccessSpecification;
use Korobovn\CloudPayments\RequestManagementStrategy\Specification\ZeroReasonCodeInModelSpecification;
use Korobovn\CloudPayments\Response\TokenTransactionAcceptedResponse;
use Korobovn\CloudPayments\Response\TokenTransactionRejectedResponse;
use Korobovn\CloudPayments\Response\InvalidRequestResponse;
use Korobovn\CloudPayments\Response\Model\TokenTransactionAcceptedModel;
use Korobovn\CloudPayments\Response\Model\TokenTransactionRejectedModel;
use Korobovn\CloudPayments\Response\ResponseInterface;

/**
 *
 * @see https://developers.cloudpayments.ru/#oplata-po-tokenu-rekarring
 */
class TokenPaymentOnestepRequestManagementStrategy extends AbstractRequestManagementStrategy
{
    public function __construct(TokenPaymentOnestepRequest $request)
    {
        parent::__construct($request);
    }

    public function prepareRawResponse(array $response): ResponseInterface
    {
        if ((new NotModelSpecification)
            ->and(new NotSuccessSpecification)
            ->and(new IsMessageSpecification)
            ->isSatisfiedBy($response)
        ) {
            $response_interface = new InvalidRequestResponse($response['Message']);
        } elseif ((new IsReasonCodeInModelSpecification)
            ->and(new NotSuccessSpecification)
            ->and(new NotMessageSpecification)
            ->isSatisfiedBy($response)
        ) {
            $model              = $response['Model'];
            $response_interface = new TokenTransactionRejectedResponse(new TokenTransactionRejectedModel(
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
            $response_interface = new TokenTransactionAcceptedResponse(new TokenTransactionAcceptedModel(
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
