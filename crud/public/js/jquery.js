$(document).ready(function () {
    $(".row").on("click","button",function () {
        if($(this).text() === "Edit") {
            $("#author-box").val($(this).closest(".row").children(".author").text());
            $("#title-box").val($(this).closest(".row").children(".title").text());
            $("#isbn-box").val($(this).closest(".row").children(".isbn").text());
            $("#id-box").val($(this).closest(".row").children(".id").text());
            $("#submit").attr("class", "btn btn-info col").text("Update");
        }
        else if($(this).text() === "Delete"){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "/books/" + $(this).closest(".row").children(".id").text(),
                method: 'DELETE',
                success: function () {
                    $("#myAlert").attr("class", "alert alert-danger collapse").show('fade');
                    $("#alert-text").text("Record has been deleted!");

                    setTimeout(function () {
                        $("#myAlert").hide('fade');
                    }, 3000);
                }
            });

            $(this).closest(".row").remove();

        }
   });

    $("#submit").click(function (e) {
        e.preventDefault();
        if (!($("#author-box").val()) || !($("#title-box").val()) || !($("#isbn-box").val())){
            alert("Input boxes must not be empty!");
            return;
        }

        if(!$.isNumeric($("#isbn-box").val())) {
            alert ("ISBN must be a number!");
            return;
        }
        if($.isNumeric($("#author-box").val()) || $.isNumeric($("#title-box").val())){
            alert("Author and Title must not be numeric!");
            return;
        }

        if($(this).html()==="Update") {

            /*$.post("../Controller/ControllerBookstore.php", {operation: "update", author: $("#author-box").val(),
                title: $("#title-box").val(), isbn: $("#isbn-box").val(), id: $("#id-box").val()});*/

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "/books/" + $("#id-box").val(),
                method: "PUT",
                data: {
                    author: $("#author-box").val(),
                    title: $("#title-box").val(),
                    isbn: $("#isbn-box").val()
                },
                success: function () {
                    $("#myAlert").attr("class","alert alert-warning collapse").show('fade');
                    $("#alert-text").text("Record has been updated!");

                    setTimeout(function () {
                        $("#myAlert").hide('fade');
                    },3000);


                    $("#submit").attr("class", "btn btn-primary").html("Save");
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                }
            });

            let row = $('.id').filter(function() {
                return $(this).text() === $("#id-box").val();
            }).closest(".row");

            row.children(".author").text($("#author-box").val());
            row.children(".title").text($("#title-box").val());
            row.children(".isbn").text($("#isbn-box").val());

        }
        else if($(this).html()==="Save") {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
           $.ajax({
                url: "/",
                method: "POST",
                data: {
                    author: $('#author-box').val(),
                    title: $("#title-box").val(),
                    isbn: $("#isbn-box").val()
                },
                dataType: "json",
                success: function (data) {
                    $("#myAlert").attr("class", "alert alert-success collapse").show('fade');
                    $("#alert-text").text("Record has been saved!");

                    setTimeout(function () {
                        $("#myAlert").hide('fade');
                    }, 3000);
                    console.log(data.html);
                    $("#body").append(data.html);
                },
               error: function (xhr, ajaxOptions, thrownError) {
                   alert(xhr.status);
                   alert(thrownError);
               }
            })
        }

        $("#author-box").val('');
        $("#title-box").val('');
        $("#isbn-box").val('');
    });
    $("#alert-close").click(function () {
        $("#myAlert").hide('fade');
    });
});