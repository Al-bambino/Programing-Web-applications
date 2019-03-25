<!DOCTYPE html>
<html>
<head>
    <title>Programiranje web aplikacija</title>
    <meta charset="utf-8"/>
</head>
<body>
<div>

    <h1>Rad sa nizovima</h1>

    <h2>Deklaracija</h2>
    <?php
        // Dva nacina za deklarisanje niza:
        $nizPredmeta = ["Programiranje WEB aplikacija","Masinsko ucenje","Racunarske mreze"];
        var_dump($nizPredmeta);
        echo "<br>";
        // Drugi nacin:
        $nizGradova = array('BG', 'KG', 'LE');
        var_dump($nizGradova);
    ?>

    <h2>Dodavanje na kraj niza</h2>
    <?php
        $brojevi[] = 45; // Nacin 1
        // Primetimo da nije potrebno prethodno inicijalizovati niz, PHP sam inicijalizuje prazan niz,
        // i potom doda na kraj niza

        var_dump($brojevi);
        echo "<br/>";

        array_push($brojevi, 37); // Nacin 2 TODO probaj da dodas niz, float ili string na kraj niza

        var_dump($brojevi);
        echo "<br/>";
    ?>

    <h2>Brisanje iz niza</h2>
    <?php
        $brojevi[] = 3;
        unset($brojevi[1]); // Brisanje clana niza, vise o unsetu -> https://secure.php.net/manual/en/function.unset.php
        // Ovde element sa indeksom 1 ne postoji vise
        echo "<br> Obrisan element: <br>";
        var_dump($brojevi[1]);
        echo "<br/>";
        var_dump($brojevi); // nismo obrisali ceo niz
    ?>

    <h3>Brisanje promenljive</h3>
    <?php
        unset($brojevi); // Brisanje promenljive
        echo "<br/> Niz brojevi: <br/>";
        var_dump($brojevi);
        echo "<br/>";
    ?>

    <h2>Prolazak kroz niz</h2>

        <h3>Prvi nacin</h3>
        <?php
            echo "<ul>";
            for ($i = 0; $i < count($nizPredmeta); $i++)
            {
                echo "<li>" . $nizPredmeta[$i] . "</li>";
            }
            echo "</ul>";
        ?>

        <h3>Drugi nacin</h3>
        <ul>
            <?php for ($i = 0; $i < count($nizPredmeta); $i++) : ?>
    <!--  Ovde HTML kod pisemo, obratite paznju na ?> znak za zatvaranje PHP koda posle : u prethodnoj liniji -->
                <li> <?php echo $nizPredmeta[$i] ?> </li>
            <?php endfor; ?>
        </ul>
        <?php
            $planeteSuncevogSistema = ["Merkur", "Venera", "Zemlja", "Mars", "Jupiter", "Saturn", "Uran", "Neptun"];
        ?>

        <h3>Treci nacin</h3>
        <ol>
            <?php
                foreach ($planeteSuncevogSistema as $planeta)
                {
                    echo "<li><strong> $planeta </strong></li>";
                }
            ?>
        </ol>

        <h3>Cetvrti nacin</h3>
        <ol>
            <?php foreach ($planeteSuncevogSistema as $planeta) : ?>
                <?php //    '<?=' je ekvivalent '<?php echo'     ?>
                <li><strong> <?= $planeta ?> </strong></li>
            <?php endforeach; ?>
        </ol>

    <h2>Neke funkcije za rad sa nizovima</h2>
    <?php
        $nizUString = implode(" , ", $nizPredmeta);
        echo "Niz u string <b>implode()</b>:<br/> $nizUString<br/>";

        $asistenti = "Milena, Nikola, Luka, Danijela";
        $stringUNiz = explode(", ", $asistenti);

        echo "String u niz <b>explode()</b>: <br/>";
        var_dump($stringUNiz);
        echo "<br/>";
    ?>

    <h2>Asocijativni nizovi</h2>
    <h3>Deklarisanje i prolazak kroz asocijativni niz</h3>
    <?php
    // Svi nizovi u PHPu su asocijativni, ako mi ne dodelimo kljuc (indeks), PHP ce sam dodeliti prvi slobodan int kao kljuc
    $strukturePodataka = [
        1 => "Stek",
        2 => "Queue",
        3 => "Lista",
        4 => "Hes mapa",
        5 => "Binarno stablo"
    ];
    // Zasto nismo ispisali Binarno stablo, iako je to fantasticna struktura podataka?
    // Razlog za to je sto idemo do count($strukturePodataka) sto je 4, indeks 5 se nece uzeti u razmatranje.
    // Jos jedna bitna stvar je da element sa indeksom 0 ne postoji -> null, stoga nemamo nikakav ispis u 0toj iteraciji
    for($i = 0; $i < count($strukturePodataka); $i++)
    {
        echo $i . " " .$strukturePodataka[$i] . "<br/>";
    }
    echo "U asocijativnom nizu sa indeksom 0 nalazi se vrednost: ";
    var_dump($strukturePodataka[0]);
    echo "<br>";

    ?>

    <h3>Jos malo asocijatvnih nizova</h3>
    <?php
    /**
     * Kao kljucevi u asocijativnom nizu mogu biti samo stringovi i integeri => vrednosti mogu biti bilo koje varijable,
     * int, string, float, NIZOVI ...
     */
    $madjionicar = [
        "ime" =>  "David",
        "prezime" => "Copperfield",
        "godinaRodjenja" => 1956,
    ];

    foreach($madjionicar as $index => $value){
        echo $index . " => " . $value . "<br/>";
    }

    echo "<br>";
    // Pristup nizu po indeksu
    echo "Najpozantiji madjionicar zove se " . $madjionicar['ime'] . "<br>";
    // Ne postoji element sa indeksom 0 -> u $madjionicar imamo: ime, prezime i goidnaRodjenja od indeksa
    echo "Element sa indeksom 0 : " . $madjionicar[0] . "<br>";

    // isset proverava da li je varijabla setovana, ako mu proseldimo indeks u nizu,
    // proverva da li je tom indeksu setovana vrednost-> https://secure.php.net/manual/en/function.isset.php
    if(isset($madjionicar[5])){
        echo "<br/>Duzina niza je: ". count($madjionicar)."<br/>";
    } else {
        echo "<br/>Nema elementa sa indeksom 5<br/>";
    }
    ?>

    <h3>Dododavanje u asocijativni niz</h3>
    <?php
    $madjionicar["drzava"] = "Sjedninjene Americke Drzave";
    var_dump($madjionicar);
    echo "<br>";
    $madjionicar[] = 13.3; // Prica od malopre, ukoliko mi ne dodelimo indeks, PHP ce sam dodeliti prvi slobodan int
                            // kao indeks
    print_r($madjionicar); // Jos jedna PHP funkcija za formatiran ispis
    ?>

    <h4>Jos malo dodavanja u niz</h4>
    <?php
    /**
     * Koliko elemenata ima ovaj niz? => count($bitneLicnosti) = 3
     * Sta su nam indeksi? => 0, 1 i 2
     * Kako pristupamo imenu elementa sa indeksom 1? => $bitneLicnosti[1]['ime']
     */
    $bitneLicnosti = [
        0 => [
            "ime" => "Alan",
            "prezime" => "Kay",
            "opis" => "Otac objektno-orjentisanog programiranja"
        ],
        1 => [
            "ime" => "Linus",
            "prezime" => "Torvalds",
            "opis" => "Napravio Linux"
        ],
        2 => [
            "ime" => "Ada",
            "prezime" => "Lovelace",
            "opis" => "Poznata kao prvi programer"
        ]
    ];
    echo "Ime osobe sa indeksom 1 : ";
    var_dump($bitneLicnosti[1]['ime']);
    echo "<br>";

    $novi = [
        "ime" => "Robert",
        "prezime" => "Martin",
        "opis" => "Najpozantiji softverski inzenjer"
    ];

    // Dodajem na kraj niza novi niz; posto nismo proseledili pod kojim kljucem hocemo da ga stavimo - PHP radi to za nas
    $bitneLicnosti[] = $novi;

    echo "<h4>Lepo formatiran niz</h4>";
    // **** Lepsi nacin za ispisvanje varijable **** => https://secure.php.net/manual/en/function.var-export.php
    echo '<pre>' . var_export($bitneLicnosti, true) . '</pre>';
    // Stari nacin :
    //    echo "<br>";
    //    var_dump($bitneLicnosti);
    //    echo "<br>";
    ?>

    <?php
        // Odavde nismo radili, proci cemo na sledecem casu, ali lepo bi bilo da pogledate :)
    ?>
    <h3>Ispisivanje u tabelu</h3>
    <table border="1">

        <?php foreach($bitneLicnosti as $bitnaLicnost) : ?>
            <tr>
                <td><?= $bitnaLicnost["ime"]; ?></td>
                <td><?= $bitnaLicnost["prezime"]; ?></td>
                <td><?= $bitnaLicnost["opis"]; ?></td>
            </tr>
        <?php endforeach; ?>

    </table>

    <h3>JOS NEKE FUNKCIJE</h3>
    <?php
    $smerovi = array(
        0 => "RN",
        1 => "S",
        2 => "RM",
    );
    echo "Pre sorta: <br>";
    print_r($smerovi);
    echo "<br/>";

    sort($smerovi); // Sortiranje vrednosti niza u rastucem redosledu!

    echo "Posle sorta: <br>";
    print_r($smerovi);
    echo "<br/>";
    ?>

    <h4>Sortiranje indeksa niza u opadajucem redosledu</h4>

    <?php
    krsort($smerovi); // Sortiranje indeksa niza u opadajucem redosledu

    print_r($smerovi);
    echo "<br/>";
    ?>

    <h4>Sortiranje vrednosti asocijativnog niza u rastucem rasporedu</h4>
    <?php
    $crvenaPlaneta = [
        "naziv" => "Mars",
        "gravitacija" => "37.6% Zemljine gravitacije",
        "trajanjeGodineUDanima" => 687,
        'uspesnihMisija' => 18
    ];

    echo "Pre sortiranja:";
    echo '<pre>' . var_export($crvenaPlaneta, true) . '</pre>';

    asort($crvenaPlaneta); // Sortiranje vrednosti asocijativnog niza u rastucem rasporedu

    echo "Posle sortiranja:";
    echo '<pre>' . var_export($crvenaPlaneta, true) . '</pre>';
    ?>

    <h4>Sortiranje indeksa asocijativnog niza u rastucem rasporedu</h4>
    <?php
    ksort($crvenaPlaneta); // Sortiranje indeksa asocijativnog niza u rastucem rasporedu

    echo '<pre>' . var_export($crvenaPlaneta, true) . '</pre>';

    ?>

    <h4>Primer 5</h4>

    <?php
    echo "Naziv: " .$crvenaPlaneta["naziv"]. ", trajanje godine: ". $crvenaPlaneta["trajanjeGodineUDanima"]."<br/>";
    ?>

    <h4>Primer 6</h4>

    <?php
    extract($crvenaPlaneta);

    echo "PROMENLJIVE - Naziv: $naziv , gravitacija: $gravitacija ";

    ?>
</div>
</body>
</html>