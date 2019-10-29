<?php

namespace Korobovn\CloudPayments\Client;

use Korobovn\CloudPayments\Request\RequestInterface;

interface HttpClientInterface
{

    public function send(RequestInterface $request);
}
