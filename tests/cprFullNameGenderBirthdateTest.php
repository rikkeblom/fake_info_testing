<?php

require_once 'src/FakeInfo.php';


use PHPUnit\Framework\TestCase;

class TestgetCprFullNameGenderAndBirthDate extends testCase {

    private FakeInfo $fakeInfo;
    
    public function setUp(): void {
        $this->fakeInfo = new FakeInfo;
    }
    public function tearDown(): void {
        unset($this->fakeInfo);
    }

    // Test we wanna do is 
    //  - Check if we get a array
    //  - Check if array is empty   
    //  - Check if the array contains the number of indexs we expected
    //  - Check if all the indexs are there 

    public function testIfArray() {
        $result = is_array($this->fakeInfo->getCprFullNameGenderAndBirthDate());

        $this->assertTrue($result);
    }

    public function testIfEmpty() {
        $result = empty($this->fakeInfo->getCprFullNameGenderAndBirthDate());

        $this->assertFalse($result);
    }

    public function testArraySize() {
        $result = sizeof($this->fakeInfo->getCprFullNameGenderAndBirthDate());
        $expected = 5;

        $this->assertEquals($result, $expected);
    }

    // Testing if the keys we want are there

    /**
     * @dataProvider provideCprFullNameAndGenderBirthDate
     */

    public function testkeyCprFullNameAndGenderBirthDate($key) {
        $result = array_key_exists($key, $this->fakeInfo->getCprFullNameGenderAndBirthDate());
        $this->assertTrue($result);
    }

    public function provideCprFullNameAndGenderBirthDate() {
        return [
            ['CPR'],
            ['firstName'],
            ['lastName'],
            ['gender'],
            ['birthDate']
        ];
    }

    // // CPR
    // public function testCprKey() {
    //     $result = array_key_exists('CPR', $this->fakeInfo->getCprFullNameGenderAndBirthDate());

    //     $this->assertTrue($result);
    // }

    // // firstName
    // public function testFirstNameKey() {
    //     $result = array_key_exists('firstName', $this->fakeInfo->getCprFullNameGenderAndBirthDate());

    //     $this->assertTrue($result);
    // }

    // // lastName
    // public function testLastNameKey() {
    //     $result = array_key_exists('lastName', $this->fakeInfo->getCprFullNameGenderAndBirthDate());

    //     $this->assertTrue($result);
    // }

    // // gender
    // public function testGenderKey() {
    //     $result = array_key_exists('gender', $this->fakeInfo->getCprFullNameGenderAndBirthDate());

    //     $this->assertTrue($result);
    // }

    // // birthDate
    // public function testBirthDateKey() {
    //     $result = array_key_exists('birthDate', $this->fakeInfo->getCprFullNameGenderAndBirthDate());

    //     $this->assertTrue($result);
    // }

}