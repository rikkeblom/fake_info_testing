<?php

require_once 'src/FakeInfo.php';

use PHPUnit\Framework\TestCase;

class Test_get_phone_number extends testCase {

    private FakeInfo $fakeInfo;
    
    public function setUp(): void {
        $this->fakeInfo = new FakeInfo;
    }

    public function tearDown(): void {
        unset($this->fakeInfo);
    }

    // we want to test if the public function get fake person
    // --TEST 1: Do we receive a strig?                                 -- DONE --
    // --TEST 2: Check if string is empty                               -- DONE --
    // --TEST 3: Check if the string contains the right format          -- DONE --



    // TEST IF "phone_number" IS AN STRING
    public function testIfString() {
        $result = is_string($this->fakeInfo->getPhoneNumber());

        $this->assertTrue($result);
    }



    // TEST IF "phone_number" STRING IS EMPTY
    public function testIfEmpty() {
        $result = empty($this->fakeInfo->getPhoneNumber());

        $this->assertFalse($result);
    }



    /**
     * @dataProvider phoneNumber
     */

    // TEST IF THE "phone_number" STRING FORMAT IS RIGHT
    public function test_if_string_format() {

        $phoneNumber = $this->fakeInfo->getPhoneNumber();

        if (is_numeric($phoneNumber) && strlen($phoneNumber) === 8) { 
            $result = true; 
        } else { 
            $result = false; 
        }

        $this->assertTrue($result);
    }



}