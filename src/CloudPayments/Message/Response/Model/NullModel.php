<?php

namespace Korobovn\CloudPayments\Message\Response\Model;

class NullModel implements ModelInterface
{
    public function toArray(): array
    {
        return [];
    }
}
