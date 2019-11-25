<?php

declare(strict_types = 1);

namespace Korobovn\CloudPayments\Message\Response\Model;

use Korobovn\CloudPayments\Message\Traits\ModelFeature\FillFromArray;

abstract class AbstractModel implements ModelInterface
{
    use FillFromArray;
}
