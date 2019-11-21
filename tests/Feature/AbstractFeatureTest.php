<?php

namespace Korobovn\Tests\Feature;

use GuzzleHttp\Client;
use Illuminate\Support\Arr;
use Korobovn\Tests\AbstractTestCase;
use Korobovn\CloudPayments\Client\CloudPaymentClient;

abstract class AbstractFeatureTest extends AbstractTestCase
{
    /** @var CloudPaymentClient */
    protected $client;

    /** @var array */
    protected $card_cryptograms;

    public function setUp(): void
    {
        parent::setUp();
        $config      = include __DIR__ . '/../../config/config.php';
        $public_key  = Arr::get($config, 'cloud_payments.public_key');
        $private_key = Arr::get($config, 'cloud_payments.private_key');

        $this->card_cryptograms = [
            'CARD_CRYPTOGRAM_PACKET_WITH_3D_SUCCESS'                =>
                Arr::get($config,
                    'cloud_payments.CARD_CRYPTOGRAM_PACKET_WITH_3D_SUCCESS'),
            'CARD_CRYPTOGRAM_PACKET_WITH_3D_FAIL'                   =>
                Arr::get($config,
                    'cloud_payments.CARD_CRYPTOGRAM_PACKET_WITH_3D_FAIL'),
            'CARD_CRYPTOGRAM_PACKET_WITHOUT_3D_SUCCESS_VISA'        =>
                Arr::get($config,
                    'cloud_payments.CARD_CRYPTOGRAM_PACKET_WITHOUT_3D_SUCCESS_VISA'),
            'CARD_CRYPTOGRAM_PACKET_WITHOUT_3D_SUCCESS_MASTER_CARD' =>
                Arr::get($config,
                    'cloud_payments.CARD_CRYPTOGRAM_PACKET_WITHOUT_3D_SUCCESS_MASTER_CARD'),
            'CARD_CRYPTOGRAM_PACKET_WITHOUT_3D_FAIL'                =>
                Arr::get($config,
                    'cloud_payments.CARD_CRYPTOGRAM_PACKET_WITHOUT_3D_FAIL'),
        ];

        $this->client = new CloudPaymentClient(
            new Client,
            $public_key,
            $private_key
        );
    }
}
