<?php

namespace CrystalCode\Php\Common;

use IteratorAggregate;
use Traversable;

final class ValuesObject extends ValuesObjectBase implements IteratorAggregate
{

    /**
     * 
     * @param array $values
     */
    public function __construct(array $values)
    {
        parent::__construct($values);
    }

    /**
     * 
     * @param string $name
     * @return mixed
     */
    public function __get(string $name)
    {
        return $this->getValue($name);
    }

    /**
     * 
     * @param string $name
     * @param mixed $value
     * @return void
     */
    public function __set(string $name, $value): void
    {
        $this->setValue($name, $value);
    }

    /**
     * 
     * @param string $name
     * @return bool
     */
    public function __isset(string $name): bool
    {
        return $this->hasValue($name);
    }

    /**
     * 
     * @param string $name
     * @return void
     */
    public function __unset(string $name): void
    {
        $this->unsetValue($name);
    }

    /**
     * 
     * {@inheritdoc}
     */
    public function getIterator(): Traversable
    {
        foreach ($this->getArray() as $name => $value) {
            yield $name => $value;
        }
    }

}
