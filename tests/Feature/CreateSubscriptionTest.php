<?php

namespace Korobovn\Tests\Feature;

use Korobovn\CloudPayments\Message\Request\CreateSubscriptionRequest;
use Korobovn\CloudPayments\Message\Response\InvalidRequestResponse;
use Korobovn\CloudPayments\Message\Response\SubscriptionResponse;

/**
 * @group feature
 * @group create-subscription
 *
 * @see https://developers.cloudpayments.ru/#sozdanie-podpiski-na-rekurrentnye-platezhi
 */
class CreateSubscriptionTest extends AbstractFeatureTest
{
    public function test(): void
    {
        $request = new CreateSubscriptionRequest;
        $request->getModel()
            ->setToken('477BBA133C182267FE5F086924ABDC5DB71F77BFC27F01F2843F2CDC69D89F05')
            ->setAccountId('user@example.com')
            ->setDescription('Ежемесячная подписка на сервис example.com')
            ->setEmail('user@example.com')
            ->setAmount(1.02)
            ->setCurrency('RUB')
            ->setRequireConfirmation(false)
            ->setStartDate('2014-08-06T16:46:29.5377246Z')
            ->setInterval('Month')
            ->setPeriod(1);

        $response = $this->client->send($request);

        if ($response instanceof SubscriptionResponse) {
            $this->assertTrue(true);
        } elseif ($response instanceof InvalidRequestResponse) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
}
