<?php

/**
 * Unit tests for getFakePersons
 * @author  Rikke Blom
 * @version  1.0, March 2023
 */


use PHPUnit\Framework\TestCase;
require_once 'src/FakeInfo.php';

class getFakePersonsTest extends TestCase {
    private FakeInfo $fakeInfo;
    public function setUp(): void {
        $this->fakeInfo = new FakeInfo;
    }

    public function tearDown(): void {
        unset($this->fakeInfo);
    }

    /**
     * @dataProvider provideAmountOfFakePersons
     */
    public function test_if_array($amount) {
        $result = gettype($this->fakeInfo->getFakePersons($amount));
        $expected = 'array';
        
        $this->assertEquals($expected, $result);
    }

    public function provideAmountOfFakePersons() {
        return [
            [0, 2], 
            [1, 2],
            [2, 2], 
            [100, 100], 
            [1.5, 2], 
        ];
    }

    /**
     * @dataProvider provideArrayKey
     * 
     * Changed to version that looks through each fakePerson array in the fakePersons array 
     * instead of just looking in the first one
     */
    public function test_if_array_contains_key($key, $expected) {
        $resultArray = $this->fakeInfo->getFakePersons();
        forEach ($resultArray as $array){
            $result = array_key_exists($key, $array);
            $this->assertEquals($expected, $result);
        }
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

    /**
     * @dataProvider provideAmountOfFakePersons
     */
    public function test_if_array_contains_correct_amount_of_persons($amount, $expected) {
        $result = count($this->fakeInfo->getFakePersons($amount));
        
        $this->assertEquals($result, $expected);
    }

    // TEST IF FOR UNWANTED KEYS
    public function test_if_array_contains_unwanted_keys() {
        $acceptedKeys = ['CPR'=>'', 'firstName'=>'', 'lastName'=>'', 'gender'=>'', 'birthDate'=>'', 'address'=>'', 'phoneNumber'=>''];
        $fakePersonArray = $this->fakeInfo->getFakePersons()[0];
        forEach (array_keys($fakePersonArray) as $key){
            $result = array_key_exists($key, $acceptedKeys);
            $this->assertTrue($result);
        }         
    }
}