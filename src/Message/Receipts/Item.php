<?php

namespace Korobovn\CloudPayments\Message\Receipts;

use Korobovn\CloudPayments\Message\References\Vat;
use Korobovn\CloudPayments\Message\References\PaymentType;
use Korobovn\CloudPayments\Message\References\PaymentObject;

class Item
{
    /**
     * Наименование товара.
     *
     * @var string
     */
    protected $label;

    /**
     * Цена.
     *
     * @var float
     */
    protected $price;

    /**
     * Колличество.
     *
     * @var float
     */
    protected $quantity;

    /**
     * Сумма.
     *
     * @var float
     */
    protected $amount;

    /**
     * Ставка НДС.
     *
     * @see Vat
     *
     * @var int|null
     */
    protected $vat;

    /**
     * Признак способа расчета - признак способа расчета.
     *
     * @see PaymentType
     *
     * @var int
     */
    protected $method;

    /**
     * Признак предмета расчета - признак предмета товара, работы, услуги, платежа, выплаты, иного предмета расчета.
     *
     * @see PaymentObject
     *
     * @var int
     */
    protected $object;

    /**
     * Единица измерения.
     *
     * @var string
     */
    protected $measurement_unit;

    /**
     * Наименование товара.
     *
     * @param string $label
     *
     * @return Item
     */
    public function setLabel(string $label): self
    {
        $this->label = $label;

        return $this;
    }

    /**
     * Цена.
     *
     * @param float $price
     *
     * @return Item
     */
    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Колличество.
     *
     * @param float $quantity
     *
     * @return Item
     */
    public function setQuantity(float $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Сумма.
     *
     * @param float $amount
     *
     * @return Item
     */
    public function setAmount(float $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Ставка НДС.
     *
     * @param int|null $vat
     *
     * @return Item
     */
    public function setVat(?int $vat): self
    {
        $this->vat = $vat;

        return $this;
    }

    /**
     * Признак способа расчета - признак способа расчета.
     *
     * @param int $method
     *
     * @see PaymentType
     *
     * @return Item
     */
    public function setMethod(int $method): self
    {
        $this->method = $method;

        return $this;
    }

    /**
     * Признак предмета расчета - признак предмета товара, работы, услуги, платежа, выплаты, иного предмета расчета.
     *
     * @param int $object
     *
     * @return Item
     */
    public function setObject(int $object): self
    {
        $this->object = $object;

        return $this;
    }

    /**
     * Единица измерения.
     *
     * @param string $measurement_unit
     *
     * @return Item
     */
    public function setMeasurementUnit(string $measurement_unit): self
    {
        $this->measurement_unit = $measurement_unit;

        return $this;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return \array_filter([
            'label'           => $this->label,
            'price'           => $this->price,
            'quantity'        => $this->quantity,
            'amount'          => $this->amount,
            'vat'             => $this->vat,
            'method'          => $this->method,
            'object'          => $this->object,
            'measurementUnit' => $this->measurement_unit,
        ]);
    }
}
