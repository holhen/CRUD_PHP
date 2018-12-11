$(document).ready(function () {
    let books, row;
    $.getJSON( "../Controller/ControllerBookstore.php?show_books=true", function( data ) {
        $.each( data, function( index, value ) {
            $("div:empty:first").text(value.id);
            $("div:empty:first").text(value.author);
            $("div:empty:first").text(value.title);
            $("div:empty:first").text(value.isbn);
        });
    });

   $(".edit").click(function () {
       $("#author-box").val($(this).closest(".row").children(".author").text());
       $("#title-box").val($(this).closest(".row").children(".title").text());
       $("#isbn-box").val($(this).closest(".row").children(".isbn").text());
       $("#id-box").val($(this).closest(".row").children(".id").text());
       $("#submit").attr("class","btn btn-info col").text("Update");
   });

   $(".delete").click(function () {
       $("#myAlert").attr("class", "alert alert-danger collapse").show('fade');
       $("#alert-text").text("Record has been deleted!");

       setTimeout(function () {
           $("#myAlert").hide('fade');
       }, 3000);

       $.post("../Controller/ControllerBookstore.php", {id: $(this).closest(".row").children(".id").text(), operation: "delete"});

       $(this).closest(".row").children(".id").text('');
       $(this).closest(".row").children(".author").text('');
       $(this).closest(".row").children(".title").text('');
       $(this).closest(".row").children(".isbn").text('');
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
            $("#myAlert").attr("class","alert alert-warning collapse").show('fade');
            $("#alert-text").text("Record has been updated!");

            setTimeout(function () {
                $("#myAlert").hide('fade');
            },3000);


            $("#submit").attr("class", "btn btn-primary").html("Save");

            $.post("../Controller/ControllerBookstore.php", {operation: "update", author: $("#author-box").val(),
                title: $("#title-box").val(), isbn: $("#isbn-box").val(), id: $("#id-box").val()});

            let row = $('.id').filter(function() {
                return $(this).text() === $("#id-box").val();
            }).closest(".row");

            row.children(".author").text($("#author-box").val());
            row.children(".title").text($("#title-box").val());
            row.children(".isbn").text($("#isbn-box").val());
        }
        else if($(this).html()==="Save") {
            $("#myAlert").attr("class", "alert alert-success collapse").show('fade');
            $("#alert-text").text("Record has been saved!");

            setTimeout(function () {
                $("#myAlert").hide('fade');
            }, 3000);

            $.ajax({
                url: "../Controller/ControllerBookstore.php",
                method: "POST",
                data: {
                    operation: 'save',
                    author: $('#author-box').val(),
                    title: $("#title-box").val(),
                    isbn: $("#isbn-box").val()
                },
                dataType: "json",
                success: function (data) {
                    $("div:empty:first").text(data.id);
                    $("div:empty:first").text(data.author);
                    $("div:empty:first").text(data.title);
                    $("div:empty:first").text(data.isbn);
                },
                error: function () {
                    alert("Két azonos könyv nem szerepelhet a listán!");
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