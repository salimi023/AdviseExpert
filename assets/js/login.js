$(document).ready(function() {

    var baseUrl = $("span#baseUrl").text();

    // Fő konténer magasságának beállítása a viewport méretéhez képest
    var height = $(window).height();
    $("div#wrapperLogin").css("height", height + "px");

    // Alert doboz elrejtése (default)
    $("div.alert").hide();

    // Belépési adatok küldése
    $("button.send").click(function() {

        if ($("span#validationStatus").text() === '') {

            var formData = {
                "userEmail": $("input#email").val(),
                "userPass": $("input#pass").val()
            };

            var data = JSON.stringify(formData);

            $.ajax({
                url: baseUrl + 'index.php/login/validateuser',
                type: "POST",
                data: { data: data },
                dataType: "html",
                success: function(response) {
                    response === 'success' ? window.location.href = baseUrl + 'index.php/adminhome' : $("div.fail").text('Sajnos, nincs ilyen felhasználó!').show();
                }
            });
        }
    });
});