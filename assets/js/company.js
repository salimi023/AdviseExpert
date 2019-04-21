$(document).ready(function() {

    var baseUrl = $("span#baseUrl").text();

    // Kontakt mezők hozzáadása, amennyiben szükséges 
    var contactField = $("input.contact").length;

    if (contactField < 3) {
        var neededField = 3 - parseInt(contactField);
        var counter = 2;

        for (var i = 1; i <= neededField; i++) {
            $("div.contact-list").append('<input id="compCont' + counter + '" name="compCont' + counter + '" type="text" class="form-control contact" value="" /><br />');
            counter++;
        }
    }

    $("button.send").click(function() {
        var validationStatus = $("span#validationStatus").text();

        if (validationStatus === '') {
            var targetUrl, confMsg, failMsg, data;
            var formData = {};
            var contact = [];
            var targetId = $(this).data("comp_id") !== '' ? $(this).data("comp_id") : false;
            var action = $(this).data("action");

            switch (action) {

                case 'save':
                    targetUrl = 'savecompany';
                    confMsg = 'A cég mentése sikerült!';
                    failMsg = 'A céget nem sikerült elmenteni! Kérem, próbálja meg újra!';
                    break;

                case 'update':
                    targetUrl = 'updatecompany/' + targetId;
                    confMsg = 'A cég módosítása sikerült!';
                    failMsg = 'A céget nem sikerült módosítani! Kérem, próbálja meg újra!';
                    break;

                case 'delete':

                    if (confirm("Biztos, hogy törölni akarja a céget?")) {
                        targetUrl = 'deletecompany/' + targetId;
                        confMsg = 'A cég törlése sikerült!';
                        failMsg = 'A céget nem sikerült törölni! Kérem, próbálja meg újra!';
                    }
                    break;
            }

            // Cég kezelése

            if (targetUrl !== '') {

                if (action !== 'delete') {

                    formData = { // Cégadatok
                        "compName": $("input#compName").val(),
                        "compEmail": $("input#compEmail").val(),
                        "compAddress": $("input#compAddress").val(),
                        "compCat": $("select#compCat").val(),
                        "compStat": $("select#compStat").val(),
                        "compDate": $("input#compDate").val(),
                    };
                    data = JSON.stringify(formData);

                    $("input.contact").each(function() { // Kontakt adatok
                        var contactName = $(this).val() !== '' ? $(this).val() : '';
                        contactName !== '' ? contact.push(contactName) : '';
                    });

                } else {
                    data = '';
                    contact = '';
                }

                $.ajax({
                    url: baseUrl + 'index.php/company/company/' + targetUrl,
                    type: "POST",
                    data: { data: data, contact: contact },
                    dataType: "html",
                    success: function(response) {

                        if (response === 'success') {
                            alert(confMsg);
                            window.location.href = baseUrl + 'index.php/company/company';
                        } else {
                            alert(failMsg);
                            return;
                        }
                    }
                });
            }
            // Cég kezelésének a vége
        }
    });
});