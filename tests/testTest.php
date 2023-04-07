<?php

/**
 * Unit tests to see if the CI system works
 * @author  Rikke Blom
 * @version  1.0, March 2023
 */


use PHPUnit\Framework\TestCase;

class testTest extends TestCase {
    public function testFake() {
        $result = 2 + 2;
        $expected = 4;
        
        $this->assertEquals($expected, $result);
    }
}