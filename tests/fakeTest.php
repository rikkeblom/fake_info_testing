<?php

require_once 'src/FakeInfo.php';


use PHPUnit\Framework\TestCase;

class TestgetCprFullNameAndGender extends testCase {

    private $testInfo = getCprFullNameAndGender();

    // Test we wanna do is 
    //  - Check if we get a array
    //  - Check if array is empty
    //  - Check if the array contains the number of indexs we expected
    //  - Check if all the indexs are there 

    public function testIfArray() {
        $result = is_array($testInfo);
        $expected = "true";

        $this->assertEquals($result, $expected);
    }

    public function testIfEmpty() {
        $result = empty($testInfo);
        $expected = "false";

        $this->assertEquals($result, $expected);
    }

    public function testArraySize() {
        $result = sizeof($result);
        $expected = 4;

        $this->assertEquals($result, $expected);
    }

    // public function testIndexs() {
    //     $result = 0

    //     if (in_array('CPR') = true) {
    //         $result = $result + 1;
    //     }
    //     if (in_array('firstName') = true) {
    //         $result = $result + 1;
    //     }
    //     if (in_array('lastName') = true) {
    //         $result = $result + 1;
    //     }
    //     if (in_array('gender') = true) {
    //         $result = $result + 1;
    //     }

    //     $expected = 4;

    //     $this->assertEquals($result, $expected);
    // }

}

class TestgetCprFullNameGenderAndBirthDate extends testCase {

    $testInfo = getCprFullNameGenderAndBirthDate();

    // Test we wanna do is 
    //  - Check if we get a array
    //  - Check if array is empty   
    //  - Check if the array contains the number of indexs we expected
    //  - Check if all the indexs are there 

    public function testIfArray() {
        $result = is_array($testInfo);
        $expected = "true";

        $this->assertEquals($result, $expected);
    }

    public function testIfEmpty() {
        $result = empty($testInfo);
        $expected = "false";

        $this->assertEquals($result, $expected);
    }

    public function testArraySize() {
        $result = sizeof($result);
        $expected = 5;

        $this->assertEquals($result, $expected);
    }

    // public function testIndexs() {
    //     $result = 0

    //     if (in_array('CPR') = true) {
    //         $result = $result + 1;
    //     }
    //     if (in_array('firstName') = true) {
    //         $result = $result + 1;
    //     }
    //     if (in_array('lastName') = true) {
    //         $result = $result + 1;
    //     }
    //     if (in_array('gender') = true) {
    //         $result = $result + 1;
    //     }
    //     if (in_array('birthDate') = true) {
    //         $result = $result + 1;
    //     }

    //     $expected = 5;

    //     $this->assertEquals($result, $expected);
    // }
}