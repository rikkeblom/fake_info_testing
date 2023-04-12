<?php



use PHPUnit\Framework\TestCase;

require_once 'src/FakeInfo.php';

class Fake_Full_Name_Test extends TestCase {


    private FakeInfo $fakeInfo;


    public function setUp(): void {
        $this->fakeInfo = new FakeInfo;
    }

    public function tearDown(): void {
        unset($this->fakeInfo);
    }


    public function TestIfArray() {
        $result = is_array($this->fakeInfo->getFullNameAndGender());

        $this->assertTrue($result);
    }


    public function TestIfemptiy() {
        $result = is_array($this->fakeInfo->getFullNameAndGender());

        $this->assertFalse($result);
    }


    public function TestArraySize() {
        $result = is_array($this->fakeInfo->getFullNameAndGender());
        $expected = 5;


        $this->assertEquals($result, $expected);
    }


    public function TestIfIndex() {
        $result = is_array($this->fakeInfo->getFullNameAndGender());

        $expected = 10;

        $this->assertTrue($result);
    }



    public function testkeyFullNameAndGender($key) {
        $result = array_key_exists($key, $this->fakeInfo->getFullNameAndGender());
        $this->assertTrue($result);
    }

    public function provideFullNameAndGender() {
        return [
            
            ['firstName'],
            ['lastName'],
            ['gender']
        ];
    }



}