<?php

namespace Korobovn\CloudPayments\Response\Model;

class NullModel implements ModelInterface
{
    public function toArray(): array
    {
        return null;
    }
}
