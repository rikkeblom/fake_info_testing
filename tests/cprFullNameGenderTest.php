<?php

require_once 'src/FakeInfo.php';


use PHPUnit\Framework\TestCase;

class TestgetCprFullNameGender extends testCase {

    private FakeInfo $testInfo;
    
    public function setUp(): void {
        $this->fakeInfo = FakeInfo;
    }
    public function tearDown(): void {
        unset($this->fakeinfo);
    }
    
    // Test we wanna do is 
    //  - Check if we get a array
    //  - Check if array is empty
    //  - Check if the array contains the number of indexs we expected
    //  - Check if all the indexs are there 

    public function testIfArray() {
        $result = is_array($this->fakeInfo->getCprFullNameAndGender());
        $expected = "true";

        $this->assertEquals($result, $expected);
    }

    public function testIfEmpty() {
        $result = empty($this->fakeInfo->getCprFullNameAndGender());
        $expected = "false";

        $this->assertEquals($result, $expected);
    }

    public function testArraySize() {
        $result = sizeof($this->fakeInfo->getCprFullNameAndGender());
        $expected = 4;

        $this->assertEquals($result, $expected);
    }

    // Testing if the keys we want are there

    // CPR
    public function testCprKey() {
        $result = in_array('CPR', $this->fakeInfo->getCprFullNameAndGender());
        $expected = "true";

        $this->assertEquals($result, $expected);
    }

    // firstName
    public function testFirstNameKey() {
        $result = in_array('firstName', $this->fakeInfo->getCprFullNameAndGender());
        $expected = "true";

        $this->assertEquals($result, $expected);
    }

    // lastName
    public function testLastNameKey() {
        $result = in_array('lastName', $this->fakeInfo->getCprFullNameAndGender());
        $expected = "true";

        $this->assertEquals($result, $expected);
    }

    // gender
    public function testGenderKey() {
        $result = in_array('gender', $this->fakeInfo->getCprFullNameAndGender());
        $expected = "true";

        $this->assertEquals($result, $expected);
    }

}

