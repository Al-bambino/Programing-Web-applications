<?php
// define variables and set to empty values
$subjectErr = $emailErr = $pointsErr = "";
$errors = false;
$subject = $email = $points = $description = "";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    if (empty($_POST["subject"])) {
        $subjectErr = "Subject can not be empty";
        $errors = true;
    } else {
        $subject = trim($_POST["subject"]);
    }

    if (empty($_POST['points'])) {
        $pointsErr = "Points can not be emtpy";
        $errors = true;
    } else if (filter_input(INPUT_POST, 'points', FILTER_VALIDATE_INT)) {
        $points = (int)$_POST['points'];
        if ($points < 0) {
            $pointsErr = "Points must be positive";
            $errors = true;
        }
    } else {
        $pointsErr = "Must be integer";
        $errors = true;
    }

    if (empty($_POST['email'])) {
        $emailErr = "Email is missing";
        $errors = true;
    } else if (filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL)) {
        $email = $_POST['email'];
    }

    $description = $_POST['description'];

    /**
     * Ako imamo greske, korisnika treba da vratimo na istu stranicu, ali sa greskama.
     * Redirekcija u PHPu se vrsi preko funkcije header.
     * Funkcija header za PHP programera ima veliki znacaj, jer omogucava dirketno pisanje HTTP headera.
     *
     * https://www.php.net/manual/en/function.header.php
     *
     * Header metoda uvek prima string kao argument. To je upravo string koji zelite da setujete kao zaglavlje
     * u vasem HTTP paketu.
     * Ako header metodu koristite za redirekciju, njen stirng izgleda:
     *          Location: <url_za_redirekciju>
     * Primetite jedan space posle dovtacke.
     * Url ne treba da bude pod navodnicima.
     *
     * ********* PRE UPOTREBE OVE FUNKCIJE OBAVEZNO PROCITATI: *********
     *  https://stackoverflow.com/questions/8028957/how-to-fix-headers-already-sent-error-in-php
     */
    if ($errors) {
        header("Location: home.php?subjectErr=$subjectErr&emailErr=$emailErr&pointsErr=$pointsErr");
        exit(); // exit funckija zavrsava izvrsavanje trenutne skripte.
        // Iako smo korisnika redirektovali skripta nastavlja da se izvrsava, tako da bi se
        // vas kod nastavljao izvrsavati na serveru dok je korisnik na drugoj stranici.
        // Ovo u velikom broju slucajeva ne zelite, te koristiee funkciju exit za zatvaranje
        // skripte.
    }

    // user's input is safe here

    include 'conection.php';
//    $pdo->query("INSERT INTO tasks (subject, description,status, user_id,  points)
//                            values ('$subject', '$description', 1, 1, $points)");


    /**
     *  Ne zelimo da saljemo podatke upita zajedno sa query-em.
     *  I ako smo validirali korisnikov input, ne znamo kakve stringove je uneo (subject, description...)
     *  Zato koristimo prepare() umesto query() metode.
     *  U prepare metodi, svaki podatak cete zameniti sa svojom placeholderom, sintaksa je :placeholder
     *  Sada ste rekli MySQL serveru koji upit (instrukcije) zelite da uradite, medjutim
     *  jos niste rekli sa kojim podacima i niste izvrsili upit - samo ste ga prirpemili.
     *  Da biste izvrsili query koristite metodu execute() koja kao parametar prima asoc niz
     *  podataka koje treba da zameni u statmentu.
     */
    $stmt = $pdo->prepare("
                  INSERT INTO tasks 
                  (subject, description, status, user_id,  points) 
                  VALUES (:subject, :description, :status, :user_id, :points)
     ");

    $stmt->execute([
        'subject' => $subject,
        'description' => $description,
        'status' => 1,
        'user_id' => 1,
        'points' => $points
    ]);

    /**
     * Primetite:
     *      1. prepare() vraca pripremljeni statment na kome pozivate execute().
     *      2. Nema potrebe da placeholdere stavljate u navodnike.
     *      3. Pri pozivu execute u asoc nizu kao kljuceve navodite nazive placeholdera bez dvotacke.
     */

    header("Location: home.php");
}
