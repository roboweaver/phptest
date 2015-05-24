<?php

// This is so it will run in the IDE 
ini_set('include_path', '.:../');

require_once('lib/Pascal.php');

class PascalTest extends PHPUnit_Framework_TestCase {

    /**
     * Test small triangle (minimal padding)
     */
    function testSmallTriangle() {
        // Line width ends up being 9 with 4 on each side of first line
        // and only one character spacing
        $expected = <<<EOD
    1    
   1 1   
  1 2 1  
 1 3 3 1 
1 4 6 4 1
EOD;

        $pascal = new Pascal(5);
        var_dump($expected);
        var_dump($pascal->output());
        $this->assertEquals($expected, $pascal->output());
    }

    /**
     * Test larger triangle (more padding).
     */
    function testBigTriangle() {
        $expected = <<<EOD
                            1                            
                         1     1                         
                      1     2     1                      
                   1     3     3     1                   
                1     4     6     4     1                
             1     5    10    10     5     1             
          1     6    15    20    15     6     1          
       1     7    21    35    35    21     7     1       
    1     8    28    56    70    56    28     8     1    
 1     9    36    84    126   126   84    36     9     1 
EOD;

        $pascal = new Pascal(10);
        $this->assertEquals($expected, $pascal->output());
    }

    /**
     * Test the function to get a row to see if we get the right numbers
     */
    function testGetRow() {
        $pascal = new Pascal(10);
        // Test if row 10 works right ..
        $previous = [1, 8, 28, 56, 70, 56, 28, 8, 1, 0];
        $expected = [1, 9, 36, 84, 126, 126, 84, 36, 9, 1];
        $row = array();
        $this->assertEquals($expected, $pascal->getRow(10, $row, $previous));

        // And row 1
        $previous = [0];
        $expected = [1];
        $this->assertEquals($expected, $pascal->getRow(1, $row, $previous));
    }

    /**
     * Test the padding
     */
    function testPad() {
        $row = [1];
        $pascal = new Pascal(10);
        $expected = "                            1                            ";
        //$expected = "                    1                    ";
        $this->assertEquals($expected, $pascal->pad($row, 0));
    }

    function testPad1() {
        $row = [1, 1];
        $pascal = new Pascal(10);
        $expected = "                         1     1                         ";
        //$expected = "                  1   1                  ";
        $this->assertEquals($expected, $pascal->pad($row, 1));
    }

    function testPad2() {
        $pascal = new Pascal(10);

        $row = [1, 2, 1];
        $expected = "                      1     2     1                      ";
        //$expected = "              1   2   1              ";
        $this->assertEquals($expected, $pascal->pad($row, 3));
    }

    function testPad3() {
        $pascal = new Pascal(10);

        $row = [1, 3, 3, 1];
        $expected = "                   1     3     3     1                   ";
        //$expected = "            1   3   3   1            ";
        $this->assertEquals($expected, $pascal->pad($row, 4));
    }

    function testPad4() {
        $pascal = new Pascal(10);

        $row = [1, 4, 6, 4, 1];
        $expected = "                1     4     6     4     1                ";
        //$expected = "          1   4   6   4   1          ";
        $this->assertEquals($expected, $pascal->pad($row, 5));
    }

    function testPad5() {
        $pascal = new Pascal(10);

        $row = [1, 5, 10, 10, 5, 1];
        $expected = "             1     5    10    10     5     1             ";
        //$expected = "        1   5   10  10  5   1        ";
        $this->assertEquals($expected, $pascal->pad($row, 6));
    }

    function testPad6() {
        $pascal = new Pascal(10);

        $row = [1, 6, 15, 20, 15, 6, 1];
        $expected = "          1     6    15    20    15     6     1          ";
        //$expected = "      1   6   15  20  15  6   1      ";
        $this->assertEquals($expected, $pascal->pad($row, 7));
    }

    function testPad7() {
        $pascal = new Pascal(10);

        $row = [1, 7, 21, 35, 35, 21, 7, 1];
        $expected = "       1     7    21    35    35    21     7     1       ";
        //$expected = "    1   7   21  35  35  21  7   1    ";
        $this->assertEquals($expected, $pascal->pad($row, 8));
    }

    function testPad8() {
        $pascal = new Pascal(10);

        $row = [1, 8, 28, 56, 70, 56, 28, 8, 1];
        $expected = "    1     8    28    56    70    56    28     8     1    ";
        //$expected = "  1   8   28  56  70  56  28  8   1  ";
        $this->assertEquals($expected, $pascal->pad($row, 9));
    }

    function testPad9() {
        $pascal = new Pascal(10);

        $row = [1, 9, 36, 84, 126, 126, 84, 36, 9, 1];
        $expected = " 1     9    36    84    126   126   84    36     9     1 ";
        //$expected = "1   9   36  84  126 126 84  36  9   1";
        $this->assertEquals($expected, $pascal->pad($row, 10));
    }

    /**
     * Test to see if we can get a reasonable idea of the size of the number
     * using powers of two
     */
    function testGetMaxNumberLength() {
        $pascal = new Pascal(10);
        $expected = 3;
        $this->assertEquals($expected, $pascal->getMaxNumberLength());
    }

    /**
     * Test for smaller number
     */
    function testGetMaxNumberLength5() {
        $pascal = new Pascal(5);
        $expected = 1;
        $this->assertEquals($expected, $pascal->getMaxNumberLength());
    }

    /**
     * Test if we get the right padding size

      function testGetPaddingSize() {
      $pascal = new Pascal(10);
      $expected = 0;
      $this->assertEquals($expected, $pascal->getPaddingSize(10));
      $expected = 18;
      $this->assertEquals($expected, $pascal->getPaddingSize(1));
      $pascal = new Pascal(5);
      $this->assertEquals(4, $pascal->getPaddingSize(1));
      }
     */

    /**
     * Test if we get the right number of spaces
     */
    function testPadNumber() {
        $pascal = new Pascal(10);
        $expected = 3;
        $this->assertEquals($expected, strlen($pascal->paddingSpaces()));
    }

    /**
     * Test formatting the number ...
     */
    function testFormatNumber() {
        $pascal = new Pascal(30);
        $expected = "    1    ";
        $this->assertEquals($expected, $pascal->formatNumber(1));
    }

    function testFormatNumber10() {
        $pascal = new Pascal(10);
        $expected = " 1 ";
        $this->assertEquals($expected, $pascal->formatNumber(1));
    }

    function testFormatNumber5() {
        $pascal = new Pascal(5);
        $expected = "1";
        $this->assertEquals($expected, $pascal->formatNumber(1));
    }

    function testGetLengthOfRow() {
        $pascal = new Pascal(10);
        $this->assertEquals(57, $pascal->getLengthOfRow());
    }

    function testGetLengthOfRow5() {
        $pascal = new Pascal(5);
        $this->assertEquals(9, $pascal->getLengthOfRow());
    }

    public function testCenter() {
        $pascal = new Pascal(10);
        $expected = str_repeat(' ', 28) . 'x' . str_repeat(' ', 28);
        $this->assertEquals($expected, $pascal->center('x'));
        $this->assertEquals(' x ', $pascal->center('x', 3));
    }
    
    public function testConcatAndPad(){
        $pascal = new Pascal(10);
        $row = [1];
        $expected = "                            1                            ";
        $this->assertEquals($expected, $pascal->concatAndPad($row, 1));
    }

}
