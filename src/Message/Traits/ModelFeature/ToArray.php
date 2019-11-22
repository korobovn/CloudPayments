<?php

declare(strict_types = 1);

namespace Korobovn\CloudPayments\Message\Traits\ModelFeature;

trait ToArray
{
    /**
     * @return array
     */
    public function toArray(): array
    {
        $result  = [];
        $methods = get_class_methods($this);

        if ($methods) {
            $getters = array_filter($methods, function ($method) {
                return preg_match('/get[A-Z]*|is[A-Z]*/', $method);
            });

            foreach ($getters as $getter) {
                if (mb_strpos($getter, 'get') === 0) {
                    $result[mb_substr($getter, 3)] = $this->$getter();
                } elseif (mb_strpos($getter, 'is') === 0) {
                    $result[mb_substr($getter, 2)] = $this->$getter();
                }
            }
        }

        return $result;
    }
}
