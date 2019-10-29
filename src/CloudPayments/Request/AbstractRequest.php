<?php

namespace Korobovn\CloudPayments\Request;

use Korobovn\CloudPayments\Request\Model\ModelInterface;

class AbstractRequest implements RequestInterface
{
    /** @var string */
    protected $domain = 'https://api.cloudpayments.ru/';

    /** @var string */
    protected $url;

    /** @var ModelInterface */
    protected $model;

    /** @var string */
    protected $method = 'POST';

    /** @var array */
    protected $headers = [
        'Content-Type' => 'application/json',
    ];

    /** @var string */
    protected $version = '1.1';

    /**
     * AbstractRequest constructor.
     *
     * @param ModelInterface $model
     */
    public function __construct(ModelInterface $model)
    {
        $this->model = $model;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return rtrim($this->domain, '/') . '/' . ltrim($this->url, '/');
    }

    /**
     * @return ModelInterface
     */
    public function getModel(): ModelInterface
    {
        return $this->model;
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * @return array
     */
    public function getHeaders(): array
    {
        return $this->headers;
    }

    /**
     * @return string
     */
    public function getVersion(): string
    {
        return $this->version;
    }
}
