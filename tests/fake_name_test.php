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


}