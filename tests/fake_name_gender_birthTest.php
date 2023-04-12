<?php

require_once 'src/FakeInfo.php';


use PHPUnit\Framework\TestCase;

class TestgetFullNameGenderAndBirthDate extends testCase {

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
        $result = is_array($this->fakeInfo->getFullNameGenderAndBirthDate());

        $this->assertTrue($result);
    }

    public function testIfEmpty() {
        $result = empty($this->fakeInfo->getFullNameGenderAndBirthDate());

        $this->assertFalse($result);
    }

    public function testArraySize() {
        $result = sizeof($this->fakeInfo->getFullNameGenderAndBirthDate());
        $expected = 4;

        $this->assertEquals($result, $expected);
    }

    // Testing if the keys we want are there

    /**
     * @dataProvider provideFullNameAndGenderBirthDate
     */

    public function testkeyFullNameAndGenderBirthDate($key) {
        $result = array_key_exists($key, $this->fakeInfo->getFullNameGenderAndBirthDate());
        $this->assertTrue($result);
    }

    public function provideFullNameAndGenderBirthDate() {
        return [
            ['firstName'],
            ['lastName'],
            ['gender'],
            ['birthDate']
        ];
    }
    
}