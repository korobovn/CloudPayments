<?php

namespace Korobovn\CloudPayments\Message\Traits\ModelFeature;

use Korobovn\CloudPayments\Message\Traits\ModelFeature\Exception\SetterMethodIsNotExist;

trait FillFromArray
{
    /**
     * @param array $data
     *
     * @throws SetterMethodIsNotExist
     */
    public function fillFromArray(array $data): void
    {
        foreach ($data as $name => $value) {
            $setter = sprintf('set%s', $name);
            if (method_exists($this, $setter)) {
                $this->$setter($value);
            } else {
                throw new SetterMethodIsNotExist(sprintf('The setter method %s for class %s is not exist',
                    $setter, static::class
                ));
            }
        }
    }
}
