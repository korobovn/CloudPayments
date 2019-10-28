<?php

namespace Korobovn\CloudPayments\Response;

use Korobovn\CloudPayments\Response\Model\ModelInterface;

abstract class AbstractResponse implements ResponseInterface
{
    /** @var ModelInterface */
    protected $model;

    /** @var bool */
    protected $success;

    /** @var string|null */
    protected $message;

    /** @var mixed|null */
    protected $inner_result = null;

    /**
     * AbstractResponse constructor.
     *
     * @param ModelInterface $model
     * @param bool           $success
     * @param string|null    $message
     * @param mixed|null     $inner_result
     */
    public function __construct(ModelInterface $model, bool $success, ?string $message, $inner_result = null)
    {
        $this->model        = $model;
        $this->success      = $success;
        $this->message      = $message;
        $this->inner_result = $inner_result;
    }

    /**
     * @return ModelInterface
     */
    public function getModel(): ModelInterface
    {
        return $this->model;
    }

    /**
     * @return bool
     */
    public function isSuccess(): bool
    {
        return $this->success;
    }

    /**
     * @return string|null
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }

    /**
     * @return mixed|null
     */
    public function getInnerResult()
    {
        return $this->inner_result;
    }

    public function toArray(): array
    {
        return [
            'Model'       => $this->model->toArray(),
            'Success'     => $this->isSuccess(),
            'Message'     => $this->getMessage(),
            'InnerResult' => $this->getInnerResult(),
        ];
    }
}
