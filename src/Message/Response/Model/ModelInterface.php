<?php

declare(strict_types = 1);

namespace Korobovn\CloudPayments\Message\Response\Model;

use Illuminate\Contracts\Support\Arrayable;

interface ModelInterface extends Arrayable
{
    /**
     * @param array $data
     */
    public function fillFromArray(array $data): void;
}
