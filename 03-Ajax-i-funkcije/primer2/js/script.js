/**
 * Gde i kada ce se ovaj kod izvrsavati?
 *      Na browseru, na svakoj stranici na kojoj ste impotrovali ovaj (script.js) fajl.
 * Kako ovaj fajl doalzi do browsera?
 *      Klijent parsira zatrazeni fajl (home.php) i pronalazi 'src' atribut pri dnu stranice u
 *      script tagu. Odmah salje GET request serveru za taj fajl.
 *      Otvorite network tab u browseru i pogledajte koje fajlove ste dobili kada ste zatrazili home.php
 *
 * Obratite paznju na import u home.php fajlu. Buduci da browser parsira red po red
 * dobijenog fajla (home.php) mora JQuery biti ucitan pre skripte u kojoj ga koristite (scirpt.js).
 *
 * Sada smo sigunri da imamo JQuery -> mozemo ga koristiti.
 */

// Javascript objekat (key : value) parovi u viticastim zagradama
// Dosta lici asocijativnom nizu u php-u
let student = {
    ime : 'Todor',
    prezime : "Mihajlovic",
    godiste : 1997,
    predmeti : ['Web', 'Uvod u programiranje']
};
console.log(student);

// pristup vrednostima tog objekta na dva nacina:
console.log(student['godiste']);
console.log(student.ime);


// Sintaksa JQuery-a se sastoji iz 3 dela :
//      1. Poziv JQuery-a -> $
//      2. Na kom elementu se izvrsava -> ('****') radi kao CSS selektor, moze primiti i drugi jquery objekat
//      3. Akcija koju izvrsavate -> neka od mnogobrojnih JQuery metoda, pogledajte dokumentaciju

/**
 * Radimo AJAX svaki put kada se klikne dugme sa id-jem 'button'.
 * Click je Jquery metoda koja se poziva kada se desi Click event na vasoj stranici.
 * Kao argument prima funkciju koja ce se izvrsiti, argument te funkcije je opcion i to je
 * event koji se desio. Mozemo i ne moramo ga zatraziti od JQuery-a da nam ga injectuje u funkciju.
 *
 * .ajax() je funkcija koju ne pozivamo ni na jednom elementu -> sami kazemo kada ce se izvrsiti,
 * nema 2. deo Jquery sintakse.
 * Kao argument prima JavaScript objekat koji konfigurise ajax poziv.
 * Kako sve mozete konfigurisati odnosno koja polja mozete setovati:
 *      https://api.jquery.com/jquery.ajax/
 * Mi cemo koristiti osnovna: url, type, success.
 */
$('#button').click(function (e) {
    //nalazimo se u telu funkcije
    console.log("Desio se klik. Izvrsavam funckiju kojiu si mi trazio...");

    $.ajax({
        // Sada smo u telu onog naseg objekta za AJAX. Setujemo nasa polja

        // 1. KLJUC : url koji gadjamo - moze biti relativna putanja ili ceo url path
        url : "./../api.php",

        // 2. KLJUC : posto su to idalje HTTP requestovi samo u pozadini,
        // kazemo kojom metodom gadjamo
        type : "get",

        // 3. KLJUC : success je kljuc koji kao vrednost ima funkciju koja ce
        // se izvrsiti kada vam server vrati response.
        // Ta funkcija kao argument prima podatke koje vam je server poslao, tip je string
        success : function (result) {
            console.log(result);
            let obj = JSON.parse(result); // kastujemo json string koji smo dobili u objekat
            console.log(obj.titula);    // pristupamo  kljucevima tog objekta sto nam je prosledjen
            // metoda append na zadati element dodaje elemnt koji mu prosledite
            $('#srbi').append('<li>' + obj.ime + '</li>'); // https://api.jquery.com/append/

            // ukoliko saljete niz objekata sa servera:
            // for (let i = 0; i < obj.length; i++)
            // {
            //     console.log(obj[i].ime);
            //     $('#srbi').append('<li>' + obj[i].ime + '</li>')
            //
            // }
        }
    }); // ovde smo zatvorili nas JS objekat sa } pa zatvorili poziv ajax metode );
}); // zavrsavamo telo funckije sa zagradom } pa zatvaramo poziv click metode sa );

//When an HTML document is loaded into a web browser, it becomes a document object.
// The document object is the root node of the HTML document.
$(document).ready(function () {
    console.log("Ready");
});

