<?php

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
                if (strpos($getter, 'get') === 0) {
                    $result[substr($getter, 3)] = $this->$getter();
                } elseif (strpos($getter, 'is') === 0) {
                    $result[substr($getter, 2)] = $this->$getter();
                }
            }
        }

        return $result;
    }
}
