<?php

namespace Korobovn\CloudPayments\Message\Response\Model;

use Korobovn\CloudPayments\Message\Traits\ModelFeature\FillFromArray;
use Korobovn\CloudPayments\Message\Traits\ModelFeature\ToArray;

abstract class AbstractModel implements ModelInterface
{
    use FillFromArray,
        ToArray;
}
