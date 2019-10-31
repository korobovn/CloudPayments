<?php

namespace Korobovn\CloudPayments\Message\Response\Model;

use Korobovn\CloudPayments\Gateway\Arrayable;

interface ModelInterface extends Arrayable
{
    /**
     * @param array $data
     */
    public function fillFromArray(array $data): void;
}
