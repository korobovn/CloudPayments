<?php

declare(strict_types = 1);

namespace Korobovn\CloudPayments\Message\Traits\ModelFeature;

trait FillFromArray
{
    /**
     * @param array $data
     */
    public function fillFromArray(array $data): void
    {
        foreach ($data as $name => $value) {
            $setter = sprintf('set%s', ucfirst($name));
            if (method_exists($this, $setter)) {
                $this->$setter($value);
            }
        }
    }
}
