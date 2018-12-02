<?php
require_once 'ViewBookstore.php';
require_once 'Book.php';
require_once 'ModelBookstore.php';
require_once 'ControllerBookstore.php';

?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <title>PHP-CRUD</title>
        <style>
            .btn:active, .btn:focus{
                border: none;
                box-shadow: none;
            }
        </style>
    </head>
    <body>

        <div class="container">

            <div id="myAlert" class="alert alert-success collapse">
                <span id="alert-text"></span>
                <a id="alert-close" class="close" href="#" aria-label="Close">&times;</a>
            </div>

        <div class="row justify-content-center">
            <table id = "books-table" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Author</th>
                        <th>Title</th>
                        <th>ISBN</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
            </table>
        </div>
        
       
        <div class="row justify-content-center">
            <form action="">
                <div class="form-group">
                    <input id = "id-box" type="hidden" name="id">
                    <label>Author</label>
                    <input id = "author-box" type="text" class="form-control" name="author" placeholder="Enter the author of the book">
                </div>
                <div class="form-group">
                    <label>Title</label>
                    <input id = "title-box" type="text" class="form-control" name="title" placeholder="Enter the title of the book">
                </div>
                 <div class="form-group">
                    <label>ISBN</label>
                    <input id = "isbn-box" type="text" class="form-control" name="isbn" placeholder="Enter your location">
                </div>
                <div class="form-group">
                    <button id = "submit" type="submit" name="save" class="btn btn-primary">Save</button>

                </div>
            </form>
        </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script src="jquery.js"></script>
    </body>
</html>