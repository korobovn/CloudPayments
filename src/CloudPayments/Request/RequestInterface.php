<?php

namespace Korobovn\CloudPayments\Request;

use Korobovn\CloudPayments\Request\Model\ModelInterface;

interface RequestInterface
{
    /**
     * @return ModelInterface
     */
    public function getModel(): ModelInterface;

    /**
     * @return string
     */
    public function getUrl(): string;

    /**
     * @return string
     */
    public function getMethod(): string;

    /**
     * @return array
     */
    public function getHeaders(): array;

    /**
     * @return string
     */
    public function getVersion(): string;
}
