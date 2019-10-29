<?php

namespace Korobovn\CloudPayments\Gateway\Illuminate;

interface Arrayable extends \Illuminate\Contracts\Support\Arrayable
{
    public function toArray(): array;
}
