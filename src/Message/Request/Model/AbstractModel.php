<?php

declare(strict_types = 1);

namespace Korobovn\CloudPayments\Message\Request\Model;

use Korobovn\CloudPayments\Message\Traits\ModelFeature\ToArray;

abstract class AbstractModel implements ModelInterface
{
    use ToArray;
}
