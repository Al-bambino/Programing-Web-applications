<?php
// Definiste sta zelite da vratite kao response za request na ovu stranicu
$vozd = [
    'ime' => 'Djordje',
    'prezime' => 'Petrovic',
    'titula' => 'Vozd',
    'bitke' => ['Misar', 'Deligrad']
];

$vojskovodje = [
    [
        'ime' => 'Stevan',
        'prezime' => 'Sindjelic',
        'titula' => 'Vojvoda',
        'bitke' => ['Ivankovac', 'Deligrad', 'Cegar']
    ],
    [
        'ime' => 'Stanoje', // Rodjen kod Smedervske Palanke
        'prezime' => 'Glavas',
        'titula' => 'Vojvoda',
        'bitke' => ['Deligrad', 'Beograd', 'Prokuplje']
    ],
    [
        'ime' => 'Petar',
        'prezime' => 'Dobrnjac',
        'titula' => 'Buljubasa', // zapovednik cete -> kasnije postaje vojvoda
        'bitke' => ['Ivankovac', 'Deligrad']
    ],
];
// jsno_encode -> saljemo na kljineta JSON kako bi ga lakse parsirao.
// echo salje string koji ste mu zadali na kljineta
echo json_encode($vozd);