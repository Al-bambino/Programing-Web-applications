$('#add-task').submit(function (e) {
    e.preventDefault(); // ne dozovoljavamo da se forma posalje, mi cemo je poslati iz ajaxa
    // serialize metoda datu formu pretvara u JSON, kljuc (name atribute inputa) : value (uneta vrednost)
    let formData = $('#add-task').serialize();
    $.ajax({
        url : "/primer3/add-task.php",
        // url : form.attr('action') drugi nacin
        type : "post",
        data : formData, // kljuc data kao vrednost prima podatke koje hocete da posaljete (object/string/array)
        success : function (result) {
            console.log(result);
            let obj = JSON.parse(result);
            let task = '';
            if(obj.completed === 'completed') {
                task = "<strike>" + obj.description + "</strike>";
            } else if (obj.completed === 'uncompleted'){
                task = obj.description;
            }
            $('#tasks').append('<li>' + task + '</li>');
        }
    })
});