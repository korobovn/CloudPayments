<?php

namespace Korobovn\CloudPayments;

use GuzzleHttp\ClientInterface;
use Illuminate\Config\Repository;
use Illuminate\Contracts\Container\Container;
use Illuminate\Support\ServiceProvider;
use Korobovn\CloudPayments\Client\CloudPaymentClient;

class CloudPaymentsServiceProvider extends ServiceProvider
{
    /**
     * Register package services.
     *
     * @return void
     */
    public function register()
    {
        $this->initializeConfigs();

        $this->app->singleton(CloudPaymentClient::class, function (Container $app) {

            $http_client = $app->make(ClientInterface::class);
            /** @var Repository $config */
            $config = $app->make('config');

            return new CloudPaymentClient(
                $http_client,
                $config->get(static::getConfigRootKeyName() . '.cloud_payments.public_key', ''),
                $config->get(static::getConfigRootKeyName() . '.cloud_payments.private_key', '')
            );
        });
    }

    /**
     * Initialize configs.
     *
     * @return void
     */
    protected function initializeConfigs()
    {
        $this->mergeConfigFrom(static::getConfigPath(), static::getConfigRootKeyName());
    }

    /**
     * Returns path to the configuration file.
     *
     * @return string
     */
    public static function getConfigPath()
    {
        return __DIR__ . '/../../config/cloud-payments.php';
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
}
