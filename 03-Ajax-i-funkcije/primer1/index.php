<?php

// Dat je asocijativni niz $d -> ispisite 'hello' u browseru
$d = [
    'k1' => [ 1, 2, [
            'k2' => ['this is tricky', [
                'though' => [1, 2, ['hello']]
                ]]
        ]],
];
var_dump($d); // niz duzine 1, jedini kljuc -> k1
echo '<br>';
var_dump($d['k1']); // niz duzine 3, elementi 1, 2, i niz
echo '<br>';
var_dump($d['k1'][2]); // asoc niz duzine jedan -> jedini kljuc k2
echo '<br>';
//...
//...
echo $d['k1'][2]['k2'][1]['though'][2][0];

var_dump($d);
include 'functions.php';
dumper($d);


$n = [
    1 => 'str',
    45 => 4000,
    '2' => 'g',
    23 => 's',
];
echo arrMaxKey($n);
