<?php

namespace Korobovn\CloudPayments\Message\Response;

use Korobovn\CloudPayments\Message\Response\Model\ModelInterface;

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
     * @param array $data
     */
    public function fillFromArray(array $data): void
    {
        $this->success = $data['Success'];

        if (isset($data['Message'])) {
            $this->message = $data['Message'];
        }

        if (isset($data['InnerResult'])) {
            $this->inner_result = $data['InnerResult'];
        }

        if (isset($data['Model'])) {
            $this->model->fillFromArray($data['Model']);
        }
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
