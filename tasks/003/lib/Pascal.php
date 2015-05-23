<?php

class Pascal {

    public function __construct($integer) {
        $this->integer = $integer;
    }

    public function output() {
        $return = "";
        // Set up an array with length of one
        $previous = array(1);
        // Set up array for row
        $row = array();
        // Loop through the number of rows 
        for ($i = 1; $i <= $this->integer; $i++) {
            // Get the row for this line ...
            $row = $this->getRow($i, $row, $previous);
            // Pad it with the right number of spaces
            $append = $this->pad($row, $i);
            $return .= $append;
            if ($i < $this->integer) {
                // Append the output
                $return .= "\n";
            }
            // Set the previous array to what we need
            $previous = $row;
            // Clear out the row array
            $row = array();
            // Add one element so we match lengths
            $previous[] = 0;
        }
        // Return the whole thing
        return $return;
    }

    /**
     * Return a row based on the current line and the previous
     * row's contents
     * 
     * @param type $i
     * @param type $row
     * @param type $previous
     * @return type
     */
    public function getRow($i, $row, $previous) {
        $row[0] = 1;
        for ($j = 1; $j < $i; $j++) {
            $row[$j] = $previous[$j] + $previous[$j - 1];
        }
        return $row;
    }

    /**
     * Pad the row with leading spaces
     * 
     * @param type $row
     * @param type $number
     * @return type
     */
    public function pad($row, $number) {
        return str_repeat(' ', $this->getPaddingSize($number)) . $this->concatAndPad($row, $number);
    }

    /**
     * Figure out the biggest number we can get ...
     * 
     * @return type
     */
    public function getMaxNumberLength() {
        return strlen(pow(2, $this->integer));
    }

    /**
     * Figure out the total row padding size
     */
    public function getPaddingSize($number) {
        // For integer of 10
        // Max line size = integer * max size number = 30
        // 
        // for integer of 5
        // Max line size = integer * max size number = 10
        
        return ($this->getMaxNumberLength() * ($this->integer - $number))/2;
    }

    /**
     * Return the number of spaces we need for this number
     * 
     * Size is the maximum length number we expect less the length of
     * the current number.
     * 
     * So for an integer we expect 3 digits as the largest number, a single 
     * digit number will get two spaces of pad.
     * 
     */
    public function padNumber($number) {
        $return = "";
        // figure out how many spaces we need to add after this 
        for ($i = 0; $i < $this->getMaxNumberLength() - strlen($number); $i++) {
            $return .= " ";
        }
        return $return;
    }

    /**
     * Return the padding for this value ...
     * 
     * @param type $row
     * @return type
     */
    public function concatAndPad($row, $number) {
        $return = "";
        $size = count($row);
        $itemCount = 1;
        foreach ($row as $value) {
            $return .= $value;
            if ($itemCount++ < $size) {
                $return .= $this->padNumber($value);
            } else {
                $return .= str_repeat(' ', $this->getPaddingSize($number));
            }
        }
        return $return;
    }

}
