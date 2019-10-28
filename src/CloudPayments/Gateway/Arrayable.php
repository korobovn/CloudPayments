<?php

namespace Korobovn\CloudPayments\Gateway;

interface Arrayable extends \Illuminate\Contracts\Support\Arrayable
{
    public function toArray(): array;
}
