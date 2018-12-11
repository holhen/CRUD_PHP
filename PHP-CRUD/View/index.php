<?php
require_once '../Controller/ControllerBookstore.php';
require_once '../Model/Book.php';
require_once '../Conf/Dbh.php';
require_once '../Model/ModelBookstore.php';

?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
        <title>PHP-CRUD</title>
    </head>
    <body>

    <div class="container">

        <div id="myAlert" class="alert alert-success collapse">
            <span id="alert-text"></span>
            <a id="alert-close" class="close" href="#" aria-label="Close">&times;</a>
        </div>

        <div class="row">
            <div class="col"><h5>ID</h5></div>
            <div class="col"><h5>Author</h5></div>
            <div class="col"><h5>Title</h5></div>
            <div class="col"><h5>ISBN</h5></div>
            <div class="col"><h5>Action</h5></div>
        </div>
        <div class="row">
            <div class="col id"></div>
            <div class="col author"></div>
            <div class="col title"></div>
            <div class="col isbn"></div>
            <div class="col buttons">
                    <button class='btn btn-info edit'>Edit</button>
                    <button class='btn btn-danger delete'>Delete</button>
            </div>
        </div>
        <div class="row">
            <div class="col id"></div>
            <div class="col author"></div>
            <div class="col title"></div>
            <div class="col isbn"></div>
            <div class="col buttons">
                <button class='btn btn-info edit'>Edit</button>
                <button class='btn btn-danger delete'>Delete</button>
            </div>
        </div>
        <div class="row">
            <div class="col id"></div>
            <div class="col author"></div>
            <div class="col title"></div>
            <div class="col isbn"></div>
            <div class="col buttons">
                <button class='btn btn-info edit'>Edit</button>
                <button class='btn btn-danger delete'>Delete</button>
            </div>
        </div>
        <div class="row">
            <div class="col id"></div>
            <div class="col author"></div>
            <div class="col title"></div>
            <div class="col isbn"></div>
            <div class="col buttons">
                <button class='btn btn-info edit'>Edit</button>
                <button class='btn btn-danger delete'>Delete</button>
            </div>
        </div>
        <div class="row">
            <div class="col id"></div>
            <div class="col author"></div>
            <div class="col title"></div>
            <div class="col isbn"></div>
            <div class="col buttons">
                <button class='btn btn-info edit'>Edit</button>
                <button class='btn btn-danger delete'>Delete</button>
            </div>
        </div>
        <div class="row">
            <div class="col id"></div>
            <div class="col author"></div>
            <div class="col title"></div>
            <div class="col isbn"></div>
            <div class="col buttons">
                <button class='btn btn-info edit'>Edit</button>
                <button class='btn btn-danger delete'>Delete</button>
            </div>
        </div>
        <div class="row">
            <div class="col id"></div>
            <div class="col author"></div>
            <div class="col title"></div>
            <div class="col isbn"></div>
            <div class="col buttons">
                <button class='btn btn-info edit'>Edit</button>
                <button class='btn btn-danger delete'>Delete</button>
            </div>
        </div>
        <div class="row">
            <div class="col id"></div>
            <div class="col author"></div>
            <div class="col title"></div>
            <div class="col isbn"></div>
            <div class="col buttons">
                <button class='btn btn-info edit'>Edit</button>
                <button class='btn btn-danger delete'>Delete</button>
            </div>
        </div>
        <div class="row">
            <div class="col id"></div>
            <div class="col author"></div>
            <div class="col title"></div>
            <div class="col isbn"></div>
            <div class="col buttons">
                <button class='btn btn-info edit'>Edit</button>
                <button class='btn btn-danger delete'>Delete</button>
            </div>
        </div>
        <div class="row">
            <div class="col id"></div>
            <div class="col author"></div>
            <div class="col title"></div>
            <div class="col isbn"></div>
            <div class="col butons">
                <button class='btn btn-info edit'>Edit</button>
                <button class='btn btn-danger delete'>Delete</button>
            </div>
        </div>



        <div class="row justify-content-center" >
            <form action="" class="col-4">
                <input id = "id-box" type="hidden" name="id">
                <div class="form-group row">
                    <label class="col-4">Author</label>
                    <input id = "author-box" type="text" class="form-control col-8" name="author" placeholder="Enter the author of the book">
                </div>
                <div class="form-group row">
                    <label class="col-4">Title</label>
                    <input id = "title-box" type="text" class="form-control col-8" name="title" placeholder="Enter the title of the book">
                </div>
                <div class="form-group row">
                    <label class="col-4">ISBN</label>
                    <input id = "isbn-box" type="text" class="form-control col-8" name="isbn" placeholder="Enter the ISBN of the book">
                </div>
                <div class="form-group row">
                    <button id = "submit" type="submit" name="save" class="btn btn-primary col-12">Save</button>

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