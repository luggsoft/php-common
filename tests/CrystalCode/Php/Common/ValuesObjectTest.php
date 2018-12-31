<?php

namespace CrystalCode\Php\Common;

use PHPUnit\Framework\TestCase;

class ValuesObjectTest extends TestCase
{

    /**
     * 
     * @return void
     */
    public function test1(): void
    {
        $valuesObject = new ValuesObject([
            'a' => 42,
        ]);

        $this->assertTrue(isset($valuesObject->a));
        $this->assertTrue($valuesObject->hasValue('a'));

        $this->assertEquals(42, $valuesObject->a);
        $this->assertEquals(42, $valuesObject->getValue('a'));

        $this->assertFalse(isset($valuesObject->b));
        $this->assertFalse($valuesObject->hasValue('b'));

        $this->assertEquals(null, $valuesObject->b);
        $this->assertEquals(null, $valuesObject->getValue('b'));
        $this->assertEquals(4242, $valuesObject->getValue('b', 4242));

        $valuesObject->b = 'hello';

        $this->assertTrue(isset($valuesObject->b));
        $this->assertTrue($valuesObject->hasValue('b'));

        $this->assertEquals('hello', $valuesObject->b);
        $this->assertEquals('hello', $valuesObject->getValue('b'));

        $this->assertFalse(isset($valuesObject->c));
        $this->assertFalse($valuesObject->hasValue('c'));

        $this->assertEquals(null, $valuesObject->c);
        $this->assertEquals(null, $valuesObject->getValue('c'));
        $this->assertEquals(4242, $valuesObject->getValue('c', 4242));

        $this->assertEquals(['a' => 42, 'b' => 'hello'], $valuesObject->getArray());

        $array = [];

        foreach ($valuesObject as $name => $value) {
            $array[$name] = $value;
        }

        $this->assertEquals(['a' => 42, 'b' => 'hello'], $array);
    }

    /**
     * 
     * @return void
     */
    public function test2(): void
    {
        $valuesObject = ValuesObject::create(['a' => 1, 'b' => 2]);
        $this->assertEquals(1, $valuesObject->a);
        $this->assertEquals(2, $valuesObject->b);
        $this->assertNull($valuesObject->c);
    }

    /**
     * 
     * @return void
     */
    public function test3(): void
    {
        $valuesObject = ValuesObject::create((object) ['a' => 1, 'b' => 2]);
        $this->assertEquals(1, $valuesObject->a);
        $this->assertEquals(2, $valuesObject->b);
        $this->assertNull($valuesObject->c);
    }

    /**
     * 
     * @return void
     */
    public function test4(): void
    {
        $valuesObject = ValuesObject::create(['a' => 1, 'b' => 2]);
        $valuesObject = ValuesObject::create($valuesObject);
        $this->assertEquals(1, $valuesObject->a);
        $this->assertEquals(2, $valuesObject->b);
        $this->assertNull($valuesObject->c);
    }

}
