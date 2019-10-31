<?php

namespace Korobovn\CloudPayments\Message\Request\Model;

class NullModel implements ModelInterface
{
    public function toArray(): array
    {
        return [];
    }
}
