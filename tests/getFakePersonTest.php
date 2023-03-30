<?php

/**
 * Unit tests for full fake person
 * @author  Rikke Blom
 * @version  1.0, March 2023
 */


use PHPUnit\Framework\TestCase;
require_once 'src/FakeInfo.php';

class getFakePersonTest extends TestCase {
    private FakeInfo $fakeInfo;
    public function setUp(): void {
        $this->fakeInfo = new FakeInfo;
    }

    public function tearDown(): void {
        unset($this->fakeInfo);
    }


    // we want to test if the public function get fake person
    // we should receive an associative array - so we should test if that is right 
    // it should contain 7 keys (CPR, firstName, lastName, gender, birthDate, address, phoneNumber)
    // @return array ['CPR' => value, 'firstName' => value, 'lastName' => value, 'gender' => 'female'|'male', 'birthDate' => value, 'phoneNumber' => value]
    
    // SHOULD WE MOCK? 
    // i don't think it make sense to mock in this test 

    public function test_getFakePerson() {
        $result = gettype($this->fakeInfo->getFakePerson());
        $expected = 'array';
        
        $this->assertEquals($expected, $result);
    }
}