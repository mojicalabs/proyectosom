<?php
function multiSort() {
    //get args of the function 
    $args = func_get_args();
    $c = count($args);
    if ($c < 2) {
        return false;
    }
    //get the array to sort 
    $array = array_splice($args, 0, 1);
    $array = $array[0];
    //sort with an anoymous function using args 
    usort($array, function($a, $b) use($args) {
                $i = 0;
                $c = count($args);
                $cmp = 0;
                while ($cmp == 0 && $i < $c) {
                    print($i . "<br>");
                    $field = $args[$i];
                    $cmp = strcmp($a->$field, $b->$field);
                    $i++;
                }
                return $cmp;
            });
    return $array;
}
?>
