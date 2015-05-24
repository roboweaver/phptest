<?php

class Pascal {

    public function __construct($integer) {
        $this->integer = $integer;
    }

    /**
     * Output the formatted triangle
     * 
     * @return string
     */
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
     * @param number $i
     * @param array $row 
     * @param array $previous
     * @return array that represents the new row
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
     * @param array $row
     * @param number $number
     * @return string representing the padded row
     */
    public function pad($row, $number) {
        return $this->concatAndPad($row, $number);
    }

    /**
     * Figure out the biggest number we can get ...
     * 
     * @return number representing the largest size
     */
    public function getMaxNumberLength() {
        return strlen(pow(2, $this->integer - 2));
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
     * @return String that is as long as the largest number
     */
    public function paddingSpaces() {
        return str_repeat(" ", $this->getMaxNumberLength());
    }

    /**
     * Return the padding for this value ...
     * 
     * @param array $row
     * @return String of numbers with padding
     */
    public function concatAndPad($row, $number) {
        $return = "";
        $size = count($row);
        $itemCount = 1;
        foreach ($row as $value) {
            $return .= $this->formatNumber($value);
            if ($itemCount++ < $size) {
                $return .= $this->paddingSpaces();
            }
        }

        return $this->center($return);
    }

    /**
     * Center a string in a specified length 
     * @param string $string
     * @param number $length
     * @return string with original string centered in it
     */
    public function center($string, $length = 0) {
        if ($length == 0) {
            $length = $this->getLengthOfRow();
        }
        // Just in case we're trying to center something that is too big
        if (strlen($string) >= $length){ return $string; }
        $padNeeded = $length - strlen($string);
        $padHalf = $padNeeded / 2;
        return str_repeat(' ', floor($padHalf)) . $string . str_repeat(' ', round($padHalf));
    }

    /**
     * Format the number to be centered in the getMaxNumberLength()
     * @param type $numberParam
     */
    public function formatNumber($numberParam) {
        return $this->center($numberParam, $this->getMaxNumberLength());
    }

    /**
     * Figure out the row width using the total rows and the maximum number size
     * for those rows.
     * 
     * @return number which is the size of the rows.
     */
    public function getLengthOfRow() {
        return (2 * ($this->integer) - 1) * ($this->getMaxNumberLength());
    }


}
