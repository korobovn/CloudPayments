<?php

declare(strict_types = 1);

namespace Korobovn\CloudPayments\Message\Request;

use Korobovn\CloudPayments\Message\Request\Model\ModelInterface;
use Korobovn\CloudPayments\Message\Response\Cryptogram3dSecureAuthRequiredResponse;
use Korobovn\CloudPayments\Message\Response\CryptogramTransactionAcceptedResponse;
use Korobovn\CloudPayments\Message\Response\CryptogramTransactionRejectedResponse;
use Korobovn\CloudPayments\Message\Response\InvalidRequestResponse;
use Korobovn\CloudPayments\Message\Strategy\CryptogramPaymentStrategy;
use Korobovn\CloudPayments\Message\Request\Model\CryptogramPaymentModel;
use Korobovn\CloudPayments\Message\Strategy\StrategyInterface;

/**
 * @method CryptogramPaymentModel getModel()
 * @method InvalidRequestResponse|Cryptogram3dSecureAuthRequiredResponse|CryptogramTransactionRejectedResponse|CryptogramTransactionAcceptedResponse send()
 * @method static CryptogramPaymentOneStepRequest create()
 *
 * @see https://developers.cloudpayments.ru/#oplata-po-kriptogramme
 */
class CryptogramPaymentOneStepRequest extends AbstractRequest
{
    /**
     * {@inheritDoc}
     */
    protected function getRelativeUrl(): string
    {
        return '/payments/cards/charge';
    }

    /**
     * {@inheritDoc}
     */
    public function createModel(): ModelInterface
    {
        return new CryptogramPaymentModel;
    }

    /**
     * {@inheritDoc}
     */
    public function getStrategy(): StrategyInterface
    {
        return new CryptogramPaymentStrategy;
    }
}
