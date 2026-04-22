$(document).ready(function () {

    $("#track").click(function (event) {
        event.preventDefault();
        $.ajax({
            url: "track_process.php",
            method: "POST",
            data: $("form").serialize(),
            success: function (data) {
                $("#resp").html(data);
            }
        })
    })

})