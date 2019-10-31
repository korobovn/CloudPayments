<?php

namespace Korobovn\CloudPayments\Message\Response;

use Korobovn\CloudPayments\Gateway\Arrayable;
use Korobovn\CloudPayments\Message\Response\Model\ModelInterface;

interface ResponseInterface extends Arrayable
{
    /**
     * @return ModelInterface
     */
    public function getModel(): ModelInterface;

    /**
     * @return bool
     */
    public function isSuccess(): bool;

    /**
     * @return string|null
     */
    public function getMessage(): ?string;

    /**
     * @return mixed
     */
    public function getInnerResult();
}
