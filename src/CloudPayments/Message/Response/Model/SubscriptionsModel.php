<?php

namespace Korobovn\CloudPayments\Message\Response\Model;

/**
 *
 * @see https://developers.cloudpayments.ru/#poisk-podpisok
 *
 */
class SubscriptionsModel extends AbstractModel implements \Iterator, \ArrayAccess, \Countable
{
    /** @var array|SubscriptionModel[] */
    protected $subscriptions = [];

    /** @var int */
    protected $position = 0;

    /**
     * {@inheritDoc}
     */
    public function fillFromArray(array $data): void
    {
        foreach ($data as $subscription_data) {
            $subscription = new SubscriptionModel;
            $subscription->fillFromArray($subscription_data);
            $this->subscriptions[] = $subscription;
        }
    }

    /**
     * {@inheritDoc}
     */
    public function toArray(): array
    {
        return array_map(function (SubscriptionModel $subscription) {
            return $subscription->toArray();
        }, $this->subscriptions);
    }

    public function current()
    {
        return $this->subscriptions[$this->position];
    }

    public function next()
    {
        $this->position++;
    }

    public function key()
    {
        return $this->position;
    }

    public function valid()
    {
        return isset($this->subscriptions[$this->position]);
    }

    public function rewind()
    {
        $this->position = 0;
    }

    public function offsetExists($offset)
    {
        return isset($this->subscriptions[$offset]);
    }

    public function offsetGet($offset)
    {
        return isset($this->subscriptions[$offset])
            ? $this->subscriptions[$offset]
            : null;
    }

    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->subscriptions[] = $value;
        } else {
            $this->subscriptions[$offset] = $value;
        }
    }

    public function offsetUnset($offset)
    {
        unset($this->subscriptions[$offset]);
    }

    public function count()
    {
        return count($this->subscriptions);
    }
}
