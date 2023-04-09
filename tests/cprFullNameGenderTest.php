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

        $this->assertTrue($result);
    }

    public function testIfEmpty() {
        $result = empty($this->fakeInfo->getCprFullNameAndGender());

        $this->assertFalse($result);
    }

    public function testArraySize() {
        $result = sizeof($this->fakeInfo->getCprFullNameAndGender());
        $expected = 4;

        $this->assertEquals($result, $expected);
    }

    // Testing if the keys we want are there

    /**
     * @dataProvider testkeysinarrayCprFullNameAndGender
     */

     public function testkeysinarrayCprFullNameAndGender() {
        return [
            ['CPR'],
            ['firstName'],
            ['lastName'],
            ['gender']
        ];
    }

    public function testkeyCprFullNameAndGender($key) {
        $result = in_array($key, $this->fakeinfo->getCprFullNameAndGender());
        $this->assertTrue($result);
    }

    // // CPR
    // public function testCprKey() {
    //     $result = in_array('CPR', $this->fakeInfo->getCprFullNameAndGender());

    //     $this->assertTrue($result);
    // }

    // // firstName
    // public function testFirstNameKey() {
    //     $result = in_array('firstName', $this->fakeInfo->getCprFullNameAndGender());

    //     $this->assertTrue($result);
    // }

    // // lastName
    // public function testLastNameKey() {
    //     $result = in_array('lastName', $this->fakeInfo->getCprFullNameAndGender());

    //     $this->assertTrue($result);
    // }

    // // gender
    // public function testGenderKey() {
    //     $result = in_array('gender', $this->fakeInfo->getCprFullNameAndGender());

    //     $this->assertTrue($result);
    // }



}

