<?php

require_once 'src/FakeInfo.php';

use PHPUnit\Framework\TestCase;

class Test_get_Cpr_Address_Phone extends testCase {

    private FakeInfo $fakeInfo;
    public function setUp(): void {
        $this->fakeInfo = new FakeInfo;
    }

    public function tearDown(): void {
        unset($this->fakeInfo);
    }

    // we want to test if the public function get fake person
    // --TEST 1: Do we receive an associative array?                                -- DONE --
    // --TEST 2: Check if array is empty                                            -- DONE --
    // --TEST 3: Check if the array contains the rows "CPR ADDRESS PHONENUMBER"     -- DONE --
    // --TEST 4: Check if address is an array                                       -- DONE --
    // --TEST 5: Check if the array "address" has all its rows



    // TEST IF WE RECIVE AN ARRAY
    public function testIfArray() {
        $result = is_array($this->fakeInfo->getFakePerson());
        $expected = true;

        $this->assertEquals($result, $expected);
    }



    // TEST IF ARRAY IS EMPTY
    public function testIfEmpty() {
        $result = empty($this->fakeInfo->getFakePerson());
        $expected = false;

        $this->assertEquals($result, $expected);
    }



    /**
     * @dataProvider arrayRows
     */

    // TEST IF THE ARRAY HAS THE ROWS "CPR ADDRESS PHONE_NUMBER"
    public function test_if_array_has_rows($row, $expected) {

        $result = array_key_exists($row, $this->fakeInfo->getFakePerson());

        $this->assertEquals($expected, $result);
    }

    public function arrayRows() {
        return [
            ['CPR', true],  
            ['address', true], 
            ['phoneNumber', true],
        ];
    }



    // TEST IF "address" IS AN ARRAY
    public function test_if_address_is_array() {
        $result = is_array($this->fakeInfo->getFakePerson('address'));
        $expected = true;
    
        $this->assertEquals($result, $expected);
    }



}