<?php

namespace Korobovn\CloudPayments\Response;

use Korobovn\CloudPayments\Gateway\Illuminate\Arrayable;
use Korobovn\CloudPayments\Response\Model\ModelInterface;

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
