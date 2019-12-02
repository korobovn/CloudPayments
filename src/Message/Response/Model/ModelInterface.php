<?php

declare(strict_types = 1);

namespace Korobovn\CloudPayments\Message\Response\Model;

use Illuminate\Contracts\Support\Arrayable;

interface ModelInterface extends Arrayable
{
    /**
     * Filling an object from an array
     *
     * @param array $data
     */
    public function fillObjectFromArray(array $data): void;
}
