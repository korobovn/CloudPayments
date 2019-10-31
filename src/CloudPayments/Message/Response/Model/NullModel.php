<?php

namespace Korobovn\CloudPayments\Message\Response\Model;

class NullModel extends AbstractModel
{
    public function toArray(): array
    {
        return [];
    }
}
