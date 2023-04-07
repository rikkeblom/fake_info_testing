<?php

require_once 'src/FakeInfo.php';

use PHPUnit\Framework\TestCase;

class Test_get_Cpr_Adress_Phone extends testCase {

    private FakeInfo $fakeInfo;
    public function setUp(): void {
        $this->fakeInfo = new FakeInfo;
    }

    public function tearDown(): void {
        unset($this->fakeInfo);
    }

    // we want to test if the public function get fake person
    // --TEST 1: Do we receive an associative array?
    // --TEST 2: Check if array is empty
    // --TEST 3: Check if the array contains the number of indexs we expected
    // --TEST 4: Check if all the indexs are there 
    // --TEST 5: Does the array contain the 7 keys (CPR, firstName, lastName, gender, birthDate, address, phoneNumber)?


    // TEST IF WE RECIVE AN ARRAY
    public function testIfArray() {
        $result = is_array($this->fakeInfo->getFakePerson());
        $expected = 'true';

        $this->assertEquals($result, $expected);
    }



    // TEST IF ARRAY IS EMPTY
    public function testIfEmpty() {
        $result = empty($this->fakeInfo->getFakePerson());
        $expected = 'false';

        $this->assertEquals($result, $expected);
    }



    // TEST IF WE RECIEVE AN ARRAY
    public function test_if_array() {
        $result = gettype($this->fakeInfo->getFakePerson());
        $expected = 'array';
        
        $this->assertEquals($expected, $result);
    }


}