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
    // --TEST 4: Check if the "street" is the right format                          -- DONE --
    // --TEST 5: Check if the "number" is the right format                          -- DONE --
    // --TEST 6: Check if the "floor" is the right format                           -- DONE --
    // --TEST 7: Check if the "door" is the right format                            -- DONE --
    // --TEST 8: Check if the "postal_code" is the right format                     -- DONE --
    // --TEST 9: Check if the "town_name" is the right format                       -- DONE --



    // TEST IF "address" IS AN ARRAY
    public function testIfArray() {
        $result = is_array($this->fakeInfo->getAddress()['address']);

        $this->assertTrue($result);
    }



    // TEST IF "address" ARRAY IS EMPTY
    public function testIfEmpty() {
        $result = empty($this->fakeInfo->getAddress()['address']);

        $this->assertFalse($result);
    }



     /**
     * @dataProvider arrayRows
     */

    // TEST IF THE "address" ARRAY HAS THE RIGHT ROWS
    public function test_if_array_has_rows($row) {

        $result = array_key_exists($row, $this->fakeInfo->getAddress()['address']);

        $this->assertTrue($result);
    }

    public function arrayRows() {
        return [
            ['street'],  
            ['number'], 
            ['floor'],
            ['door'],
            ['postal_code'],
            ['town_name']
        ];
    } 



    // TEST IF THE "street" FORMAT IS RIGHT
    public function test_street_format() {

        $street = $this->fakeInfo->getAddress()['address']['street'];

        if (strlen($street) === 40) { 
            $result = true; 
        } else { 
            $result = false; 
        }

        $this->assertTrue($result);
    }



    /**
     * @dataProvider formatStreetTest
     */

    // TEST IF OUR "street" FORMAT IS RIGHT
    public function test_our_street_format($street, $expected) {

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
            ['ggggggggggmmmmmmmmmmkkkkkkkkkkuuuuuuuuuu ', false],  
            [' ggggggggggmmmmmmmmmmkkkkkkkkkkssssssssss', false],   
            
            ['ggggggggggmmmmmmmmmmkkkkkkkkkkqqqqqqqqqq', true],  
        ];
    }



    // TEST IF THE "number" FORMAT IS RIGHT
    public function test_number_format() {

        $number = $this->fakeInfo->getAddress()['address']['number'];
        
        if (strlen($number) <= 4) {
            $result = true;
        } else { 
            $result = false; 
        }

        $this->assertTrue($result);
    }


    /**
     * @dataProvider formatNumberTest
     */

    // TEST IF OUR "number" FORMAT IS RIGHT
    public function test_our_number_format($number, $expected) {
        
        if (strlen($number) <= 4) {
            $result = true;
        } else { 
            $result = false; 
        }

        $this->assertEquals($expected, $result);
    }

    public function formatNumberTest() {
        return [
            ['jejej', false],    
            
            ['930', true],  
        ];
    }



    // TEST IF THE "floor" FORMAT IS RIGHT
    public function test_floor_format() {

        $floor = $this->fakeInfo->getAddress()['address']['floor'];
        
        if (strlen($floor) <= 2) {
            $result = true;
        } else { 
            $result = false; 
        }

        $this->assertTrue($result);
    }



    /**
     * @dataProvider formatFloorTest
     */

    // TEST IF OUR "floor" FORMAT IS RIGHT
    public function test_our_floor_format($floor, $expected) {
        
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



    // TEST IF THE "door" FORMAT IS RIGHT
    public function test_door_format() {

        $door = $this->fakeInfo->getAddress()['address']['door'];

        if (strlen($door) <= 5) {
            $result = true;
        } else { 
            $result = false; 
        }

        $this->assertTrue($result);
    }



    /**
     * @dataProvider formatDoorTest
     */

    // TEST IF OUR "door" FORMAT IS RIGHT
    public function test_our_door_format($door, $expected) {

        if (strlen($door) <= 3) {
            $result = true;
        } else { 
            $result = false; 
        }

        $this->assertEquals($expected, $result);
    }

    public function formatDoorTest() {
        return [
            ['fkdj', false],  
            
            ['th', true],  
            ['857', true],  
        ];
    }



    // TEST IF THE "postal_code" FORMAT IS RIGHT
    public function test_postal_code_format() {

        $postal_code = $this->fakeInfo->getAddress()['address']['postal_code'];
    
        if (is_numeric($postal_code) && strlen($postal_code) === 4) {
            $result = true;
        } else { 
            $result = false; 
        }
    
        $this->assertTrue($result);
    }



    // TEST IF "town_name" IS AN STRING
    public function testIfString() {
        $result = is_string($this->fakeInfo->getAddress()['address']['town_name']);
    
        $this->assertTrue($result);
    }



    // TEST IF "town_name" STRING IS EMPTY
    public function testIfStringEmpty() {
        $result = empty($this->fakeInfo->getAddress()['address']['town_name']);
    
        $this->assertFalse($result);
    }



    // TEST IF THE "town_name" FORMAT IS RIGHT
    public function test_town_name_format() {

        $town_name = $this->fakeInfo->getAddress()['address']['town_name'];
        
        if (strlen($town_name) < 25) {
            $result = true;
        } else { 
            $result = false; 
        }
        
        $this->assertTrue($result);
    }



}