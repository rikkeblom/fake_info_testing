<?php

require_once 'src/FakeInfo.php';

use PHPUnit\Framework\TestCase;

class Test_get_Address extends testCase {

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
    // --TEST 3: Check if the array contains the right rows                         -- DONE --            



    // TEST IF "address" IS AN ARRAY
    public function testIfArray() {
        $result = is_array($this->fakeInfo->getAddress());
        $expected = true;

        $this->assertEquals($result, $expected);
    }



    // TEST IF "address" ARRAY IS EMPTY
    public function testIfEmpty() {
        $result = empty($this->fakeInfo->getAddress()['address']);
        $expected = false;

        $this->assertEquals($result, $expected);
    }



     /**
     * @dataProvider arrayRows
     */

    // TEST IF THE "address" ARRAY HAS THE RIGHT ROWS
    public function test_if_array_has_rows($row, $expected) {

        $result = array_key_exists($row, $this->fakeInfo->getAddress()['address']);

        $this->assertEquals($expected, $result);
    }

    public function arrayRows() {
        return [
            ['street', true],  
            ['number', true], 
            ['floor', true],
            ['door', true],
            ['postal_code', true],
            ['town_name', true]
        ];
    } 





}