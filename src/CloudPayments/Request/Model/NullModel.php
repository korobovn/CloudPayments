<?php

namespace Korobovn\CloudPayments\Request\Model;

class NullModel implements ModelInterface
{
    public function toArray(): array
    {
        return [];
    }
}
