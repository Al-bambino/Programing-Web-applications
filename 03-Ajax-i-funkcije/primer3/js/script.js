$('#add-task').submit(function (e) {
    e.preventDefault(); // ne dozovoljavamo da se forma posalje, mi cemo je poslati iz ajaxa
    // serialize metoda datu formu pretvara u JSON, kljuc (name atribute inputa) : value (uneta vrednost)
    let formData = $('#add-task').serialize();
    $.ajax({
        url : "/03-Ajax-i-funkcije/primer3/add-task.php",
        // url : form.attr('action') drugi nacin
        type : "post",
        data : formData, // kljuc data kao vrednost prima podatke koje hocete da posaljete (object/string/array)
        success : function (result) {
            console.log(result);
            let obj = JSON.parse(result);
            $('#tasks').append('<li>' +  obj.subject + '</li>');
        }
    })
});