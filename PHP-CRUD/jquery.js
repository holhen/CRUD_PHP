$(document).ready(function () {
    let books, row;
    $.getJSON( "ViewBookstore.php?show_books=true", function( data ) {
        $.each( data, function( index, value ) {
            books += "<tr>";
            books += "<td id='id'>"+value.id+"</td>";
            books += "<td id='author'>"+value.author+"</td>";
            books += "<td id='title'>"+value.title+"</td>";
            books += "<td id='isbn'>"+value.isbn+"</td>";
            books += "<td id='buttons'>" +
                "<button class='btn btn-info' id='edit'>Edit</button>" +
                " <button class='btn btn-danger' id='delete'>Delete</button>" +
                "</td>";
            books += "</tr>";
        });
        $("#books-table").append(books);
    });

    $("table").on("click","button",function () {
        if ($(this).text() === "Edit"){
            $("#author-box").val($(this).closest("tr").children("#author").text());
            $("#title-box").val($(this).closest("tr").children("#title").text());
            $("#isbn-box").val($(this).closest("tr").children("#isbn").text());
            $("#id-box").val($(this).closest("tr").children("#id").text());
            $("#submit").attr("class","btn btn-info").html("Update");
        }
        else if($(this).text() === "Delete") {
            $("#myAlert").attr("class", "alert alert-danger collapse").show('fade');
            $("#alert-text").text("Record has been deleted!");

            setTimeout(function () {
                $("#myAlert").hide('fade');
            }, 3000);

            $.post("ViewBookstore.php", {id: $(this).closest("tr").children("#id").text(), operation: "delete"});

            $(this).closest("tr").remove();

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
            $("#myAlert").attr("class","alert alert-warning collapse").show('fade');
            $("#alert-text").text("Record has been updated!");

            setTimeout(function () {
                $("#myAlert").hide('fade');
            },3000);


            $("#submit").attr("class", "btn btn-primary").html("Save");

            $.post("ViewBookstore.php", {operation: "update", author: $("#author-box").val(),
                title: $("#title-box").val(), isbn: $("#isbn-box").val(), id: $("#id-box").val()});

            let row = $('#books-table td').filter(function() {
                return $(this).text() === $("#id-box").val();
            }).closest("tr");

            row.children("#author").text($("#author-box").val());
            row.children("#title").text($("#title-box").val());
            row.children("#isbn").text($("#isbn-box").val());
        }
        else if($(this).html()==="Save") {
            $("#myAlert").attr("class", "alert alert-success collapse").show('fade');
            $("#alert-text").text("Record has been saved!");

            setTimeout(function () {
                $("#myAlert").hide('fade');
            }, 3000);

            $.ajax({
                url: "ViewBookstore.php",
                method: "POST",
                data: {
                    operation: 'save',
                    author: $('#author-box').val(),
                    title: $("#title-box").val(),
                    isbn: $("#isbn-box").val()
                },
                dataType: "json",
                success: function (data) {
                    row = "<tr>";
                    row += "<td id='id'>" + data.id + "</td>";
                    row += "<td id='author'>" + data.author + "</td>";
                    row += "<td id='title'>" + data.title + "</td>";
                    row += "<td id='isbn'>" + data.isbn + "</td>";
                    row += "<td id='buttons'>" +
                        "<button class='btn btn-info' id='edit'>Edit</button>" +
                        " <button class='btn btn-danger' id='delete'>Delete</button>" +
                        "</td>";
                    row += "</tr>";
                    $("#books-table").append(row)
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