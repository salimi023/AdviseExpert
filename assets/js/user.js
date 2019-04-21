$(document).ready(function() {

    var baseUrl = $("span#baseUrl").text();

    $("input#userEmail").blur(function() { // Validálás hozzáadása az e-mail mezőhöz (ha történik változás).
        $(this).addClass('valid');
    });

    $("input.pass").blur(function() { // Validálás hozzáadása az új jelszó mezőkhöz (ha történik változás).
        $("input.pass").addClass('valid');

        if ($("input.pass").siblings("label").children("span").length == 0) {
            $("input.pass").siblings("label").append('<span class="asterisk">*</span>');
        }
    });

    $("button.send").click(function() {
        var validationStatus = $("span#validationStatus").text();

        if (validationStatus === '') {
            var targetUrl, confMsg, failMsg, data;
            var targetId = $(this).data("user_id") !== '' ? $(this).data("user_id") : false;
            var action = $(this).data("action");

            switch (action) {

                case 'save':

                    if ($("input#userPass").val() === $("input#userPassConf").val()) {
                        targetUrl = 'saveuser';
                        confMsg = 'A felhasználó mentése sikerült!';
                        failMsg = 'A felhasználót nem sikerült elmenteni! Kérem, próbálja meg újra!';
                    } else {
                        $("input#userPass").val("");
                        $("input#userPassConf").val("");
                        alert('A megadott jelszavak nem egyeznek! Kérem, adja meg őket újra!');
                        return;
                    }
                    break;

                case 'update':

                    if ($("input#userPass").val() !== '' && $("input#userPassConf").val() !== '') {

                        if ($("input#userPass").val() === $("input#userPassConf").val()) {
                            targetUrl = 'updateuser/' + targetId;
                            confMsg = 'A felhasználó módosítása sikerült!';
                            failMsg = 'A felhasználót nem sikerült módosítani! Kérem, próbálja meg újra!';
                        } else {
                            $("input#userPass").val("");
                            $("input#userPassConf").val("");
                            alert('A megadott jelszavak nem egyeznek! Kérem, adja meg őket újra!');
                            return;
                        }
                    } else {
                        targetUrl = 'updateuser/' + targetId;
                        confMsg = 'A felhasználó módosítása sikerült!';
                        failMsg = 'A felhasználót nem sikerült módosítani! Kérem, próbálja meg újra!';
                    }
                    break;

                case 'delete':

                    if (confirm("Biztos, hogy törölni akarja a felhasználót?")) {
                        targetUrl = 'deleteuser/' + targetId;
                        confMsg = 'A felhasználó törlése sikerült!';
                        failMsg = 'A felhasználót nem sikerült törölni! Kérem, próbálja meg újra!';
                    }
                    break;
            }

            // Felhasználó kezelése

            if (targetUrl !== '') {

                if (action !== 'delete') {
                    var formData = {
                        "userName": $("input#userName").val(),
                        "userEmail": $("input#userEmail").val(),
                        "userPass": $("input#userPass").val()
                    };
                    data = JSON.stringify(formData);
                } else {
                    data = '';
                }

                var validPass = $("input#userOldPass").val() !== '' ? $("input#userOldPass").val() : '';

                $.ajax({
                    url: baseUrl + 'index.php/user/user/' + targetUrl,
                    type: "POST",
                    data: { data: data, validPass: validPass },
                    dataType: "html",
                    success: function(response) {

                        if (response === 'success') {
                            alert(confMsg);
                            window.location.href = baseUrl + 'index.php/user/user';
                        } else {
                            alert(failMsg);
                            return;
                        }
                    }
                });
            }
            // Felhasználó kezelésének a vége
        }
    });
});