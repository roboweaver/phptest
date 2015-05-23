<?php

class Test extends PHPUnit_Framework_TestCase {
  public function testWorking(){
    //does phpunit even work right now?
    $this->assertTrue(true);
  }

  //please fix the tests below so that they pass
  //you should only need to fix the value under test (ie the second paramter to the assert* methods)
  public function testBasicKnowledge(){
    $this->assertEquals(3*15, 45);
    $this->assertEquals("boo" . " " . "yah", "boo yah");
    $arr = array();
    array_push($arr, "foo");
    array_push($arr, "bar");
    array_unshift($arr, "baz");
    $expected = array(
        0 => "baz",
        1 => "foo",
        2 => "bar"
    );
    $this->assertEquals($arr, $expected);
  }
}
