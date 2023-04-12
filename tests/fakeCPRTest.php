<?php

require_once 'src/FakeInfo.php';

use PHPUnit\Framework\TestCase;

class Test_get_Cpr extends testCase {

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



    // TEST IF "cpr" IS AN STRING
    public function testIfString() {
        $result = is_string($this->fakeInfo->getCpr());

        $this->assertTrue($result);
    }



    // TEST IF "cpr" STRING IS EMPTY
    public function testIfEmpty() {
        $result = empty($this->fakeInfo->getCpr());

        $this->assertFalse($result);
    }



    /**
     * @dataProvider cprNumber
     */

    // TEST IF THE "cpr" STRING FORMAT IS RIGHT
    public function test_if_string_format() {

        $cpr = $this->fakeInfo->getCPR();

        if (is_numeric($cpr) && strlen($cpr) === 10) { 
            $result = true; 
        } else { 
            $result = false; 
        }

        $this->assertTrue($result);
    }



}