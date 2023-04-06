<?php

/**
 * Unit tests for getFakePerson
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
    // --TEST 1: Do we receive an associative array?
    // --TEST 2: Does the array contain the 7 keys (CPR, firstName, lastName, gender, birthDate, address, phoneNumber)?
    
    // SHOULD WE MOCK? 
    // i don't think it make sense to mock in these tests as we would just be sending in arrays that we know would or would not fit our criteria.


    // TEST IF WE RECIEVE AN ARRAY
    public function test_if_array() {
        $result = gettype($this->fakeInfo->getFakePerson());
        $expected = 'array';
        
        $this->assertEquals($expected, $result);
    }

    /**
     * @dataProvider provideArrayKey
     */
    // TEST IF ALL THE WANTED KEYS ARE PRESENT
    public function test_if_array_contains_key($key, $expected) {
        $result = array_key_exists($key, $this->fakeInfo->getFakePerson());
        $this->assertEquals($expected, $result);
    }

    public function provideArrayKey() {
        return [
            ['CPR', true], 
            ['firstName', true], 
            ['lastName', true], 
            ['gender', true], 
            ['birthDate', true], 
            ['address', true], 
            ['phoneNumber', true],

            ['birthdate', false], 
            ['hello world', false], 
            ['1', false],
            ['0', false], 
        ];
    }

    // TEST IF FOR UNWANTED KEYS
    public function test_if_array_contains_unwanted_keys() {
        $acceptedKeys = ['CPR'=>'', 'firstName'=>'', 'lastName'=>'', 'gender'=>'', 'birthDate'=>'', 'address'=>'', 'phoneNumber'=>''];
        $fakePersonArray = $this->fakeInfo->getFakePerson();
        forEach (array_keys($fakePersonArray) as $key){
            $result = array_key_exists($key, $acceptedKeys);
            $this->assertTrue($result);
        }         
    }
}