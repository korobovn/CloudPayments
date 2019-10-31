<?php

namespace Korobovn\CloudPayments\Message\Request;

use Korobovn\CloudPayments\Message\Request\Model\ModelInterface;

class AbstractRequest implements RequestInterface
{
    /** @var string */
    protected $domain = 'https://api.cloudpayments.ru/';

    /** @var string */
    protected $url;

    /** @var ModelInterface */
    protected $model;

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
}
