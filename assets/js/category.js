$(document).ready(function() {

    var baseUrl = $("span#baseUrl").text();

    $("button.send").click(function() {
        var validationStatus = $("span#validationStatus").text();

        if (validationStatus === '') {
            var targetUrl, confMsg, failMsg, data;
            var targetId = $(this).data("cat_id") !== '' ? $(this).data("cat_id") : false;
            var action = $(this).data("action");

            switch (action) {

                case 'save':
                    targetUrl = 'savecategory';
                    confMsg = 'A kategória mentése sikerült!';
                    failMsg = 'A kategóriát nem sikerült elmenteni! Kérem, próbálja meg újra!';
                    break;

                case 'update':
                    targetUrl = 'updatecategory/' + targetId;
                    confMsg = 'A kategória módosítása sikerült!';
                    failMsg = 'A kategóriát nem sikerült módosítani! Kérem, próbálja meg újra!';
                    break;

                case 'delete':

                    if (confirm("Biztos, hogy törölni akarja a kategóriát")) {
                        targetUrl = 'deletecategory/' + targetId;
                        confMsg = 'A kategória törlése sikerült!';
                        failMsg = 'A kategóriát nem sikerült törölni! Kérem, próbálja meg újra!';
                    }
                    break;
            }

            // Kategória kezelése

            if (targetUrl !== '') {

                if (action !== 'delete') {
                    var formData = {
                        "catTitle": $("input#catTitle").val(),
                        "catDesc": $("textarea#catDesc").val(),
                        "catStat": $("input#catStatus").prop("checked") ? 1 : 0
                    };
                    data = JSON.stringify(formData);
                } else {
                    data = '';
                }

                $.ajax({
                    url: baseUrl + 'index.php/category/category/' + targetUrl,
                    type: "POST",
                    data: { data: data },
                    dataType: "html",
                    success: function(response) {

                        if (response === 'success') {
                            alert(confMsg);
                            window.location.href = baseUrl + 'index.php/category/category';
                        } else {
                            alert(failMsg);
                            return;
                        }
                    }
                });
            }
            // Kategória kezelésének a vége
        }
    });
});