<?php

namespace Korobovn\CloudPayments\Message\Receipts;

use Korobovn\CloudPayments\Message\References\TaxationSystem;

class Receipt
{
    /**
     * Товарные позиции.
     *
     * @var array|Item[]
     */
    protected $items = [];

    /**
     * Место осуществления расчёта, по умолчанию берется значение из кассы.
     *
     * @var string
     */
    protected $calculation_place;

    /**
     * Система налогообложения; необязательный, если у вас одна система налогообложения.
     *
     * @see TaxationSystem
     *
     * @var int
     */
    protected $taxation_system;

    /**
     * Email покупателя, если нужно отправить письмо с чеком.
     *
     * @var string
     */
    protected $email;

    /**
     * Телефон покупателя в любом формате, если нужно отправить сообщение со ссылкой на чек.
     *
     * @var string
     */
    protected $phone;

    /**
     * Чек является бланком строгой отчётности.
     *
     * @var bool
     */
    protected $is_bso = false;

    /**
     * Сумма оплаты электронными деньгами.
     *
     * @var float
     */
    protected $electronic_amount;

    /**
     * Сумма из предоплаты (зачетом аванса) (2 знака после запятой).
     *
     * @var float
     */
    protected $advance_payment_amount;

    /**
     * Сумма постоплатой(в кредит) (2 знака после запятой).
     *
     * @var float
     */
    protected $credit_amount;

    /**
     * Сумма оплаты встречным предоставлением (сертификаты, др. мат.ценности) (2 знака после запятой).
     *
     * @var float
     */
    protected $provision_amount;

    /**
     * Товарные позиции.
     *
     * @param array $items
     *
     * @return Receipt
     */
    public function setItems(array $items): self
    {
        $this->items = $items;

        return $this;
    }

    /**
     * Место осуществления расчёта, по умолчанию берется значение из кассы.
     *
     * @param string $calculation_place
     *
     * @return Receipt
     */
    public function setCalculationPlace(string $calculation_place): self
    {
        $this->calculation_place = $calculation_place;

        return $this;
    }

    /**
     * Система налогообложения; необязательный, если у вас одна система налогообложения.
     *
     * @param int $taxation_system
     *
     * @return Receipt
     */
    public function setTaxationSystem(int $taxation_system): self
    {
        $this->taxation_system = $taxation_system;

        return $this;
    }

    /**
     * Email покупателя, если нужно отправить письмо с чеком.
     *
     * @param string $email
     *
     * @return Receipt
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Телефон покупателя в любом формате, если нужно отправить сообщение со ссылкой на чек.
     *
     * @param string $phone
     *
     * @return Receipt
     */
    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Чек является бланком строгой отчётности.
     *
     * @param bool $is_bso
     *
     * @return Receipt
     */
    public function setIsBso(bool $is_bso): self
    {
        $this->is_bso = $is_bso;

        return $this;
    }

    /**
     * Сумма оплаты электронными деньгами.
     *
     * @param float $electronic_amount
     *
     * @return Receipt
     */
    public function setElectronicAmount(float $electronic_amount): self
    {
        $this->electronic_amount = $electronic_amount;

        return $this;
    }

    /**
     * Сумма из предоплаты (зачетом аванса) (2 знака после запятой).
     *
     * @param float $advance_payment_amount
     *
     * @return Receipt
     */
    public function setAdvancePaymentAmount(float $advance_payment_amount): self
    {
        $this->advance_payment_amount = $advance_payment_amount;

        return $this;
    }

    /**
     * Сумма постоплатой(в кредит) (2 знака после запятой).
     *
     * @param float $credit_amount
     *
     * @return Receipt
     */
    public function setCreditAmount(float $credit_amount): self
    {
        $this->credit_amount = $credit_amount;

        return $this;
    }

    /**
     * Сумма оплаты встречным предоставлением (сертификаты, др. мат.ценности) (2 знака после запятой).
     *
     * @param float $provision_amount
     *
     * @return Receipt
     */
    public function setProvisionAmount(float $provision_amount): self
    {
        $this->provision_amount = $provision_amount;

        return $this;
    }

    /**
     * @param Item $item
     *
     * @return Receipt
     */
    public function addItem(Item $item): self
    {
        $this->items[] = $item;

        return $this;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        $receipt_items = [];
        foreach ($this->items as $receipt_item) {
            if ($receipt_item instanceof Item) {
                $receipt_items[] = $receipt_item->toArray();
            }
            if (\is_array($receipt_item)) {
                $receipt_items[] = $receipt_item;
            }
        }

        return \array_filter([
            'Items'            => $receipt_items,
            'calculationPlace' => $this->calculation_place,
            'taxationSystem'   => $this->taxation_system,
            'email'            => $this->email,
            'phone'            => $this->phone,
            'isBso'            => $this->is_bso,
            'amounts'          => [
                'electronic'     => \number_format((float) $this->electronic_amount, 2, '.', ''),
                'advancePayment' => \number_format((float) $this->advance_payment_amount, 2, '.', ''),
                'credit'         => \number_format((float) $this->credit_amount, 2, '.', ''),
                'provision'      => \number_format((float) $this->provision_amount, 2, '.', ''),
            ],
        ]);
    }
}
