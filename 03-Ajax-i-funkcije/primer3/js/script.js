$('#add-task').submit(function (e) {
    e.preventDefault();
    let form = $('#add-task');
    let formData = form.serialize();
    $.ajax({
        url : "/primer3/add-task.php",
        // url : form.attr('action'),
        type : "post",
        data : formData,
        success : function (result) {
            console.log(result);
            let obj = JSON.parse(result);
            let task = '';
            if(obj.completed === 'completed') {
                task = "<strike>" + obj.description + "</strike>";
            } else if (obj.completed === 'uncompleted'){
                task = obj.description;
            }
            $('#tasks').append('<li><strong>Description:</strong>' + task + '</li>');
        }
    })
});

$(document).ready(function () {
    // console.log("Ready");
});