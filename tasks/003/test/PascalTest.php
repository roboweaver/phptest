<?php
// This is so it will run in the IDE 
ini_set('include_path', '.:../');

require_once('lib/Pascal.php');

class PascalTest extends PHPUnit_Framework_TestCase {

    /**
     * Test small triangle (minimal padding)
     */
    function testSmallTriangle() {
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
        /** TODO - find out why this has extra padding on it
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
         */
        $expected = <<<EOD
                  1                  
                1   1                
              1   2   1              
            1   3   3   1            
          1   4   6   4   1          
        1   5   10  10  5   1        
      1   6   15  20  15  6   1      
    1   7   21  35  35  21  7   1    
  1   8   28  56  70  56  28  8   1  
1   9   36  84  126 126 84  36  9   1
EOD;
        $pascal = new Pascal(10);
        $this->assertEquals($expected, $pascal->output());
    }

    /**
     * Test the function to get a row to see if we get the right numbers
     */
    function testGetRow() {
        $pascal = new Pascal(10);
        $previous = [1, 8, 28, 56, 70, 56, 28, 8, 1, 0];
        $expected = [1, 9, 36, 84, 126, 126, 84, 36, 9, 1];
        $row = array();
        $this->assertEquals($expected, $pascal->getRow(10, $row, $previous));
    }
    
    /**
     * Test the padding
     */
    function testPad(){
        $row = [1];
        $pascal = new Pascal(10);
        $expected = "                    1                    ";
        $this->assertEquals($expected, $pascal->pad($row, 0));
        
    }
    function testPad1(){
        $row = [1,1];
        $pascal = new Pascal(10);
        $expected = "                  1   1                  ";
        $this->assertEquals($expected, $pascal->pad($row, 1));
        $row = [1,2,1];
        $expected = "              1   2   1              ";
        $this->assertEquals($expected, $pascal->pad($row, 3));
        
        $row = [1,3,3,1];
        $expected = "            1   3   3   1            ";
        $this->assertEquals($expected, $pascal->pad($row, 4));
        
        $row = [1,4,6,4,1];
        $expected = "          1   4   6   4   1          ";
        $this->assertEquals($expected, $pascal->pad($row, 5));
        
        $row = [1,5,10,10,5,1];
        $expected = "        1   5   10  10  5   1        ";
        $this->assertEquals($expected, $pascal->pad($row, 6));
        
        $row = [1,6,15,20,15,6, 1];
        $expected = "      1   6   15  20  15  6   1      ";
        $this->assertEquals($expected, $pascal->pad($row, 7));
        
        $row = [1,7,21, 35, 35,21,7,1];
        $expected = "    1   7   21  35  35  21  7   1    ";
        $this->assertEquals($expected, $pascal->pad($row, 8));
        
        $row = [1, 8, 28, 56, 70, 56, 28, 8, 1, 0];
        $expected = "  1   8   28  56  70  56  28  8   1   0  ";
        $this->assertEquals($expected, $pascal->pad($row, 9));
        
        $row = [1, 9, 36, 84, 126, 126, 84, 36, 9, 1];
        $expected = "1   9   36  84  126 126 84  36  9   1";
        $this->assertEquals($expected, $pascal->pad($row, 10));

        
    }
    
    /**
     * Test to see if we can get a reasonable idea of the size of the number
     * using powers of two
     */
    function testGetMaxNumberLength(){
        $pascal = new Pascal(10);
        $expected = 4;
        $this->assertEquals($expected, $pascal->getMaxNumberLength());
    }
    /**
     * Test for smaller number
     */
    function testGetMaxNumberLength5(){
        $pascal = new Pascal(5);
        $expected = 2;
        $this->assertEquals($expected, $pascal->getMaxNumberLength());
    }
    
    /**
     * Test if we get the right padding size
     */
    function testGetPaddingSize(){
        $pascal = new Pascal(10);
        $expected = 0;
        $this->assertEquals($expected, $pascal->getPaddingSize(10));
        $expected = 18;
        $this->assertEquals($expected, $pascal->getPaddingSize(1));
        $pascal = new Pascal(5);
        $this->assertEquals(4, $pascal->getPaddingSize(1));
    }
    
    /**
     * Test if we get the right number of spaces
     */
    function testPadNumber(){
        $pascal = new Pascal(10);
        $expected = 1;
        $this->assertEquals($expected, strlen($pascal->padNumber(126)));
        $expected = 3;
        $this->assertEquals($expected, strlen($pascal->padNumber(1)));
    }

}
