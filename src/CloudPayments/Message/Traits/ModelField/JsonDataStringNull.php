<?php

namespace Korobovn\CloudPayments\Message\Traits\ModelField;

use Tarampampam\Wrappers\Json;

trait JsonDataStringNull
{
    /** @var string|null */
    protected $json_data;

    /**
     * @return string|null
     */
    public function getJsonData(): ?string
    {
        return $this->json_data;
    }

    /**
     * @param string|null $json_data
     *
     * @return $this
     */
    public function setJsonData(?string $json_data): self
    {
        $this->json_data = $json_data;

        return $this;
    }

    /**
     * @return array
     * @throws \Tarampampam\Wrappers\Exceptions\JsonEncodeDecodeException
     */
    public function getJsonDataPayload(): array
    {
        return Json::decode($this->json_data, true)['payload'] ?? [];
    }

    /**
     * @return bool
     * @throws \Tarampampam\Wrappers\Exceptions\JsonEncodeDecodeException
     */
    public function isJsonDataSaveBankCard(): bool
    {
        return (bool) (Json::decode($this->json_data, true)['is_save_card'] ?? false);
    }
}
