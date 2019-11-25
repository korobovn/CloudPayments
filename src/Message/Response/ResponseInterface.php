<?php

declare(strict_types = 1);

namespace Korobovn\CloudPayments\Message\Response;

use Illuminate\Contracts\Support\Arrayable;
use Korobovn\CloudPayments\Message\Response\Model\ModelInterface;

interface ResponseInterface extends Arrayable
{
    /**
     * Get a data model of response. Different data models are set for different responses.
     *
     * @return ModelInterface
     */
    public function getModel(): ModelInterface;

    /**
     * Request status
     *
     * @return bool
     */
    public function isSuccess(): bool;

    /**
     * Response message text
     *
     * @return string|null
     */
    public function getMessage(): ?string;

    /**
     * @return mixed
     */
    public function getInnerResult();

    /**
     * Filling an object from an array
     *
     * @param array $data
     */
    public function fillObjectFromArray(array $data): void;
}
