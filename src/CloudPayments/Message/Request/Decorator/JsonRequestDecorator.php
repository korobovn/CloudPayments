<?php

namespace Korobovn\CloudPayments\Message\Request\Decorator;

class JsonRequestDecorator extends AbstractRequestDecorator
{
    /** @var array */
    protected $headers = [
        'Content-Type' => 'application/json',
    ];

    /**
     * @return string|null
     */
    public function getBody(): ?string
    {
        return json_encode($this->getModel()->toArray());
    }
}
