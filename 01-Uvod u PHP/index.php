<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Raf </title>
    <style>
        header {
            padding: 2em;
            background-color: aqua;
            text-align: center;
        }
    </style>
</head>
<body>

    <header>
        <?php

            $pocetniTekst = "CamileCase";

        ?>
        <h1>

            Ola, chikos

        </h1>
        <h2>
            <?php

                echo $pocetniTekst;

            ?>
        </h2>
        <h2>
            <?= $pocetniTekst ?>
        </h2>
    </header>
    <?php

         $broj = 3;

    ?>
    <p>
        <?php if($broj == 2): ?>
        <b> Nije tacno</b>
        <?php elseif($broj == 3): ?>
        <b>
            Nije tacno
        </b>
        <?php else: ?>
        <b> Broj je 4</b>
        <?php endif; ?>

    </p>

</body>
</html>