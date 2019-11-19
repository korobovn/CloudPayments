<?php

namespace Korobovn\CloudPayments;

use GuzzleHttp\ClientInterface;
use Illuminate\Config\Repository;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Container\Container;
use Korobovn\CloudPayments\Client\CloudPaymentClient;
use Korobovn\CloudPayments\Client\CloudPaymentClientInterface;

class CloudPaymentsServiceProvider extends ServiceProvider
{
    /**
     * Register package services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->initializeConfigs();

        $this->app->bind(CloudPaymentClient::class, function (Container $app) {
            $http_client = $app->make(ClientInterface::class);
            /** @var Repository $config */
            $config = $app->make('config');

            return new CloudPaymentClient(
                $http_client,
                $config->get(static::getConfigRootKeyName() . '.cloud_payments.public_key', ''),
                $config->get(static::getConfigRootKeyName() . '.cloud_payments.private_key', '')
            );
        });

        $this->app->bind(CloudPaymentClientInterface::class, CloudPaymentClient::class);
    }

    /**
     * Returns path to the configuration file.
     *
     * @return string
     */
    public static function getConfigPath()
    {
        return __DIR__ . '/../../config/services.php';
    }

    /**
     * Get config root key name.
     *
     * @return string
     */
    public static function getConfigRootKeyName()
    {
        return \basename(static::getConfigPath(), '.php');
    }

    /**
     * Initialize configs.
     *
     * @return void
     */
    protected function initializeConfigs(): void
    {
        $this->mergeConfigFrom(static::getConfigPath(), static::getConfigRootKeyName());
    }
}
