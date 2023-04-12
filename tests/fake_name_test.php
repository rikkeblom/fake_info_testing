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


    public function testIfEmpty() {
        $result = empty($this->fakeInfo->getFullNameGender());

        $this->assertFalse($result);
    }

    public function testArraySize() {
        $result = sizeof($this->fakeInfo->getFullNameGender());
        $expected = 5;

        $this->assertEquals($result, $expected);
    }

    // Testing if the keys we want are there

    /**
     * @dataProvider provideFullNameAndGender
     */

    public function testkeyFullNameAndGender($key) {
        $result = array_key_exists($key, $this->fakeInfo->getFullNameGender());
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