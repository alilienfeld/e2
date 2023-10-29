<?php
function vowel_count($string) {
    $vowels = ['a', 'e', 'i', 'o', 'u'];
    $chars = str_split($string);
    $count = 0;
    foreach ($chars as $char) {
        if (in_array($char, $vowels)) {
            $count += 1;
        }
    }
    return $count;
}
var_dump(vowel_count('hello'));