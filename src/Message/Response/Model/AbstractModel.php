<?php

namespace Korobovn\CloudPayments\Message\Response\Model;

use Korobovn\CloudPayments\Message\Traits\ModelFeature\ToArray;
use Korobovn\CloudPayments\Message\Traits\ModelFeature\FillFromArray;

abstract class AbstractModel implements ModelInterface
{
    use FillFromArray,
        ToArray;
}
