<?php

declare(strict_types = 1);

namespace Korobovn\CloudPayments\Message\Response\Model;

use Korobovn\CloudPayments\Message\Traits\ModelField\NonceString;
use Korobovn\CloudPayments\Message\Traits\ModelField\ExpiresAtInt;
use Korobovn\CloudPayments\Message\Traits\ModelField\SignatureString;
use Korobovn\CloudPayments\Message\Traits\ModelField\DomainNameString;
use Korobovn\CloudPayments\Message\Traits\ModelField\DisplayNameString;
use Korobovn\CloudPayments\Message\Traits\ModelField\EpochTimestampInt;
use Korobovn\CloudPayments\Message\Traits\ModelField\MerchantIdentifierString;
use Korobovn\CloudPayments\Message\Traits\ModelField\MerchantSessionIdentifierString;

class ApplePayStartSessionModel extends AbstractModel
{
    use EpochTimestampInt,
        ExpiresAtInt,
        MerchantSessionIdentifierString,
        NonceString,
        MerchantIdentifierString,
        DomainNameString,
        DisplayNameString,
        SignatureString;

    public function toArray(): array
    {
        return [
            'epochTimestamp'            => $this->getEpochTimestamp(),
            'expiresAt'                 => $this->getExpiresAt(),
            'merchantSessionIdentifier' => $this->getMerchantSessionIdentifier(),
            'nonce'                     => $this->getNonce(),
            'merchantIdentifier'        => $this->getMerchantIdentifier(),
            'domainName'                => $this->getDomainName(),
            'displayName'               => $this->getDisplayName(),
            'signature'                 => $this->getSignature(),
        ];
    }
}
