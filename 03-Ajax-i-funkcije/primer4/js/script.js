$('#button').click(function (e) {
    $.ajax({
        url : "./../api.php",
        type : "get",
        success : function (result) {
            console.log(result);
            let obj = JSON.parse(result);
            console.log(obj.bitke)
            $('#srbi').html('<li>' + obj.ime + '</li>')
            // $('#srbi').append('<li>' + obj.ime + '</li>')
// za vise:
//             for (let i = 0; i < obj.length; i++)
//             {
//                 console.log(obj[i].ime);
//                 $('#srbi').append('<li>' + obj[i].ime + '</li>')
//
//             }
        }
    })
});

$(document).ready(function () {
    console.log("Ready");
});