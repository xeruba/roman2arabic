<?php

namespace App\Helpers;
 
class Converter {

    const roman_to_decimal = [
        'I' => 1,
        'V' => 5,
        'X' => 10,
        'L' => 50,
        'C' => 100,
        'D' => 500,
        'M' => 1000,
        /* Custom overline */
        'Q' => 1000,
        'W' => 5000,
        'E' => 10000,
        'R' => 50000,
        'T' => 100000,
        'Y' => 500000,
        'U' => 1000000,
    ];

    const overline_match_array = [
        '_I' => 'Q',
        '_V' => 'W',
        '_X' => 'E',
        '_L' => 'R',
        '_C' => 'T',
        '_D' => 'Y',
        '_M' => 'U',
    ];

    
    public static function roman2arabic(String $roman_number) : int {
        
        //return self::prepareRomanOverline($roman_number);
        $roman_number = self::prepareRomanOverline($roman_number);
        $characters_array = str_split($roman_number);
        $lastIndex = count($characters_array)-1;
        $sum = 0;
    
        foreach($characters_array as $index => $digit)
        {
            if(!isset($characters_array[$index]))
            {
                continue;
            }
    
            if(isset(self::roman_to_decimal[$digit]))
            {
                if($index < $lastIndex)
                {
                    $left = self::roman_to_decimal[$characters_array[$index]];
                    $right = self::roman_to_decimal[$characters_array[$index+1]];
                    if($left < $right)
                    {
                        $sum += ($right - $left);
                        unset($characters_array[$index+1],$left, $right);
                        continue;
                    }
                    unset($left, $right);
                }
            }
            $sum += self::roman_to_decimal[$digit];
        }
    
        return $sum;
    }

    public static function prepareRomanOverline($roman_number) : string {
        foreach(self::overline_match_array as $overline_key => $overline_value){
            $roman_number = str_replace($overline_key, $overline_value, $roman_number);
        }
        return $roman_number;
    }
}