<?php
/*
 *
 */
function dumper($var)
{
    echo '<pre>' . var_export($var, true) . '</pre>';
}

function arrMaxKey($array)
{
    $keys = array_keys($array);
    $max = 0;
    foreach($keys as $key)
    {
        if(is_int($key) && $key > $max){
            $max = $key;
        }

    }
    return $max;
}