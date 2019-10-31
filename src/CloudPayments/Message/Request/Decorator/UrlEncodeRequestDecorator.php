<?php

namespace Korobovn\CloudPayments\Message\Request\Decorator;

class UrlEncodeRequestDecorator extends AbstractRequestDecorator
{
    /** @var array */
    protected $headers = [
        'Content-Type' => 'application/x-www-form-urlencode',
    ];

    /**
     * @return string|null
     */
    public function getBody(): ?string
    {
        return http_build_query($this->getModel()->toArray());
    }
}
