<?php

declare(strict_types = 1);

namespace Korobovn\CloudPayments\Message\Response\Model;

use Korobovn\CloudPayments\Message\Traits\ModelFeature\FillObjectFromArray;

abstract class AbstractModel implements ModelInterface
{
    use FillObjectFromArray;
}
