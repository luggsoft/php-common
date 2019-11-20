<?php

namespace Luggsoft\Php\Common;

abstract class ValuesObjectBase
{
    
    /**
     *
     * @var array
     */
    private $values = [];
    
    /**
     *
     * @param array $values
     */
    public function __construct(array $values)
    {
        $this->values = $values;
    }
    
    /**
     *
     * @param string $name
     * @param mixed $default
     * @return mixed
     */
    final public function getValue(string $name, $default = null)
    {
        if (isset($this->values[$name])) {
            return $this->values[$name];
        }
        return $default;
    }
    
    /**
     *
     * @param string $name
     * @param mixed $value
     * @return void
     */
    final public function setValue(string $name, $value): void
    {
        $this->values[$name] = $value;
    }
    
    /**
     *
     * @param string $name
     * @return bool
     */
    final public function hasValue(string $name): bool
    {
        return isset($this->values[$name]);
    }
    
    /**
     *
     * @param string $name
     * @return void
     */
    final public function unsetValue(string $name): void
    {
        unset($this->values[$name]);
    }
    
    /**
     *
     * @return array
     */
    final public function getArray(): array
    {
        return (array) $this->values;
    }
    
    /**
     *
     * @return object
     */
    final public function getObject(): object
    {
        return (object) $this->values;
    }
    
}
