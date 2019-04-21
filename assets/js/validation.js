$(document).ready(function() {

    $(".send").click(function() {
        var validStatus = [];
        var inputValue;

        $(".valid").each(function() {

            switch (true) {

                case $(this).is("input[type='email']"): // E-mail cím validálása
                    inputValue = $(this).val();

                    if (inputValue !== '') {
                        $(this).siblings(".alertMsg").css("display", "none");
                        removeItem($(this).attr("id"), validStatus);

                        var rem = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                        var checkEmail = rem.test(inputValue);

                        if (checkEmail == false) {
                            $(this).siblings(".alertMsg").css("display", "block");
                            validStatus.push($(this).attr("id"));
                        } else {
                            $(this).siblings(".alertMsg").css("display", "none");
                            removeItem($(this).attr("id"), validStatus);
                        }
                    } else {
                        $(this).siblings(".alertMsg").css("display", "block");
                        validStatus.push($(this).attr("id"));
                    }
                    break;

                case $(this).is("input[type='password']"): // Jelszó (csak a mező kitöltése!)
                    inputValue = $(this).val();

                    if (inputValue !== '') {
                        $(this).siblings(".alertMsg").css("display", "none");
                        removeItem($(this).attr("id"), validStatus);
                    } else {
                        $(this).siblings(".alertMsg").css("display", "block");
                        validStatus.push($(this).attr("id"));
                    }
                    break;

                case $(this).is("input[type='text']"): // Szöveg mező
                    inputValue = $(this).val();

                    if (inputValue !== '') {
                        $(this).siblings(".alertMsg").css("display", "none");
                        removeItem($(this).attr("id"), validStatus);
                    } else {
                        $(this).siblings(".alertMsg").css("display", "block");
                        validStatus.push($(this).attr("id"));
                    }
                    break;

                case $(this).is("select"): // Select lista
                    inputValue = $(this).val();

                    if (inputValue !== '') {
                        $(this).siblings(".alertMsg").css("display", "none");
                        removeItem($(this).attr("id"), validStatus);
                    } else {
                        $(this).siblings(".alertMsg").css("display", "block");
                        validStatus.push($(this).attr("id"));
                    }
                    break;

                case $(this).is("input[type='date']"): // Dátum mező
                    inputValue = $(this).val();

                    if (inputValue !== '') {
                        $(this).siblings(".alertMsg").css("display", "none");
                        removeItem($(this).attr("id"), validStatus);
                    } else {
                        $(this).siblings(".alertMsg").css("display", "block");
                        validStatus.push($(this).attr("id"));
                    }
                    break;

                default:
                    validStatus = [];
                    break;
            }
        });

        validStatus.length > 0 ? $("span#validationStatus").text("Error") : $("span#validationStatus").text("");

        function removeItem(id, array) {
            var index = array.indexOf(id);
            index > -1 ? array.splice(index, 1) : '';
            return array;
        }
    });
});