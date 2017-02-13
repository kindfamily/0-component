<?php
require_once 'PHPUnit/Framework.php';

class ArrayTest extends PHPUnit_Framework_TestCase
{
    public function testNewArrayIsEmpty()
    {
        $names = array();
        $this->assertEquals(0, sizeof($names));
    }
 
    public function testArrayContainsAnElement()
    {
        $names = array();
        $names[] = 'Bob';
        $this->assertEquals(1, sizeof($names));
    }
}

$testObject = new ArrayTest;
$testObject->testNewArrayIsEmpty();
$testObject->testArrayContainsAnElement();
?>
