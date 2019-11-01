<?php

namespace Korobovn\CloudPayments\Message\Strategy;

use Korobovn\CloudPayments\Message\Strategy\Exception\IsNotInstanceOfException;
use Korobovn\CloudPayments\Message\Strategy\Exception\StrategyCannotCreateResponseException;
use Korobovn\CloudPayments\Message\Response\ResponseInterface;
use Korobovn\CloudPayments\Message\Strategy\Specification\SpecificationInterface;

abstract class AbstractStrategy implements StrategyInterface
{
    /** @var array */
    protected $specifications = [];

    /**
     * @param array $raw_response
     *
     * @return ResponseInterface
     * @throws IsNotInstanceOfException
     * @throws StrategyCannotCreateResponseException
     */
    public function prepareRawResponse(array $raw_response): ResponseInterface
    {
        foreach ($this->specifications as $specification_class => $response_class) {
            $specification = new $specification_class;
            if (! ($specification instanceof SpecificationInterface)) {
                throw new IsNotInstanceOfException(sprintf(
                    'The class %s is not an instance of %s',
                    $specification_class, SpecificationInterface::class
                ));
            }
            if ($specification->isSatisfiedBy($raw_response)) {
                $response = new $response_class;
                if (! ($response instanceof ResponseInterface)) {
                    throw new IsNotInstanceOfException(sprintf(
                        'The class %s is not an instance of %s',
                        $response_class, ResponseInterface::class
                    ));
                }

                $response->fillFromArray($raw_response);

                return $response;
            }
        }

        throw $this->throwCannotCreateResponseException($raw_response);
    }

    /**
     * @param array $response
     *
     * @return StrategyCannotCreateResponseException
     */
    protected function throwCannotCreateResponseException(array $response): StrategyCannotCreateResponseException
    {
        /**
         * @todo can do logging $response
         */
        return new StrategyCannotCreateResponseException(
            sprintf('Strategy %s cannot create a response [%s]',
                static::class, json_encode($response)
            )
        );
    }
}
