<?php

require_once 'src/FakeInfo.php';

use PHPUnit\Framework\TestCase;

class Test_get_Address extends testCase {

    private FakeInfo $fakeInfo;
    public function setUp(): void {
        $this->fakeInfo = new FakeInfo;
    }

    public function tearDown(): void {
        unset($this->fakeInfo);
    }

    // we want to test if the public function get fake person
    // --TEST 1: Do we receive an associative array?                                -- DONE --
    // --TEST 2: Check if array is empty                                            -- DONE --
    // --TEST 3: Check if the array contains the right rows                         -- DONE --            
    // --TEST 4: Check if the "street" is the right format                          --  --
    // --TEST 5: Check if the "number" is the right format                          --  --
    // --TEST 6: Check if the "floor" is the right format                           --  --
    // --TEST 7: Check if the "door" is the right format                            --  --
    // --TEST 8: Check if the "postal_code" is the right format                     --  --
    // --TEST 9: Check if the "town_name" is the right format                       --  --



    // TEST IF "address" IS AN ARRAY
    public function testIfArray() {
        $result = is_array($this->fakeInfo->getAddress()['address']);
        $expected = true;

        $this->assertEquals($result, $expected);
    }



    // TEST IF "address" ARRAY IS EMPTY
    public function testIfEmpty() {
        $result = empty($this->fakeInfo->getAddress()['address']);
        $expected = false;

        $this->assertEquals($result, $expected);
    }



     /**
     * @dataProvider arrayRows
     */

    // TEST IF THE "address" ARRAY HAS THE RIGHT ROWS
    public function test_if_array_has_rows($row, $expected) {

        $result = array_key_exists($row, $this->fakeInfo->getAddress()['address']);

        $this->assertEquals($expected, $result);
    }

    public function arrayRows() {
        return [
            ['street', true],  
            ['number', true], 
            ['floor', true],
            ['door', true],
            ['postal_code', true],
            ['town_name', true]
        ];
    } 



    /**
     * @dataProvider formatStreetTest
     */

    // TEST IF THE "street" FORMAT IS RIGHT
/*    public function test_street_format($expected) {

        $street = $this->fakeInfo->getAddress()['address']['street'];

        if (strlen($street) === 40) { 
            $result = true; 
        } else { 
            $result = false; 
        }

        $this->assertEquals($expected, $result);
    }

    public function formatStreetTest() {
        return [
            ['ggggggggggmmmmmmmmmmkkkkkkkkkkwwwwwwww', false],  
            ['ggggggggggmmmmmmmmmm kkkkkkkkkkuuuuuuuuuu', false],  
            ['gggggggggg mmmmmmmmmmkkkkkkkkkkssssssssss', false],   
            
            ['ggggggggggmmmmmmmmmmkkkkkkkkkkqqqqqqqqqq', true],  
        ];
    }
*/



    /**
     * @dataProvider formatNumberTest
     */

    // TEST IF THE "number" FORMAT IS RIGHT
/*    public function test_number_format($expected) {

        $number = $this->fakeInfo->getAddress()['address']['number'];
        
        if (is_numeric($number) && strlen($number) === 3) {
            $result = true;
        } else { 
            $result = false; 
        }

        $this->assertEquals($expected, $result);
    }

    public function formatNumberTest() {
        return [
            ['jej', false],  
            ['j98', false],  
            ['03e', false],  
            ['76', false],  
            ['0b3', false],  
            [' 039', false],  
            ['42 6', false],  
            
            ['930', true],  
        ];
    }
*/



    /**
     * @dataProvider formatFloorTest
     */

    // TEST IF THE "floor" FORMAT IS RIGHT
/*    public function test_floor_format($expected) {

        $floor = $this->fakeInfo->getAddress()['address']['floor'];
        
        if (strlen($floor) === 2) {
            $result = true;
        } else { 
            $result = false; 
        }

        $this->assertEquals($expected, $result);
    }

    public function formatFloorTest() {
        return [ 
            [' 78', false],  
            ['64 ', false],   
            [' gr', false],  
            ['ge ', false],  
            
            ['st', true],  
            ['45', true],  
        ];
    }
*/



    /**
     * @dataProvider formatDoorTest
     */

    // TEST IF THE "door" FORMAT IS RIGHT
/*    public function test_door_format($expected) {

        $door = $this->fakeInfo->getAddress()['address']['door'];

        if (strlen($door) === 2) {
            $result = true;
        } else { 
            $result = false; 
        }

        $this->assertEquals($expected, $result);
    }

    public function formatDoorTest() {
        return [
            ['kd ', false],  
            ['k0 ', false],  
            ['0f ', false],  
            [' kl', false],  
            ['fkd', false],  
            
            ['th', true],  
        ];
    }
*/

}