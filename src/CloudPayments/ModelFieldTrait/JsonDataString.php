<?php

namespace Korobovn\CloudPayments\ModelFieldTrait;

trait JsonDataString
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
    protected function setJsonData(?string $json_data): self
    {
        $this->json_data = $json_data;

        return $this;
    }
}
