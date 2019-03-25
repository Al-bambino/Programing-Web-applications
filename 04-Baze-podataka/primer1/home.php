<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Raf</title>
</head>
<body>
<h1>Taskovi</h1>
<?php
    require 'conection.php';
    // Prvi nacin pisanja query-a u PDO je korsicenjem metode query()
    // kao rezultat dobijamo PDOStatment objekat : https://secure.php.net/manual/en/class.pdostatement.php
    // Da bismo pristipili rezulatatima koristimo fetch() ili fetchAll() metodu iz statmenta koji smo dobili
    $stmt = $pdo->query("SELECT * FROM tasks");
    // Obe metode (fetch, fetchAll) kao opcioni argument imaju nacin na koji ce podaci biti pakovani.
    // Ako niste koristili setAttribute() metodu, mozete pri svakom pozivu definisati nacin pakovanja.
    // Vama interesantni nacini mogu biti :
    //          1.  PDO::FETCH_ASSOC -> svaki dovuceni red iz baze mapira na asocijativni niz
    //              key je naziv kolnone, value je vrednost kolone
    //          2. PDO::FETCH_NUM -> mapira na niz gde su kolone indeksirane od 0
    //          3. PDO::FETCH_OBJ -> vraca objekat cija su polja kolone u bazi
    $results = $stmt->fetchAll();
?>
<div>
    <ul id="tasks">
        <?php foreach ($results as $result) :?>
            <li> <?= $result['subject'] ?></li>
        <?php endforeach; ?>
    </ul>
</div>
<div>
    <form method="post" action="tasks.php">
        <label for="subject">Task subject</label>
        <input id="subject" type="text"><br>
        <label for="description">Description</label>
        <input id="description" type="text"><br>

        <input type="submit">
    </form>
</div>
</body>
</html>