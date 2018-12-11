<?php

require_once '../Model/ModelBookstore.php';
require_once '../Model/Book.php';


class ControllerBookstore
{

    public function saveBook()
    {
            $model = new ModelBookstore;

            $author = $_POST['author'];
            $title = $_POST['title'];
            $isbn = $_POST['isbn'];

            $book = new Book($author, $title, $isbn, 0);
            $id=$model->insertIntoBookstore($book);
            $book->id=$id;

            if($id != 0){
                echo json_encode($book);
            }

    }

    public function deleteBook()
    {
            $model = new ModelBookstore;
            $id = $_POST['id'];
            $model->deleteFromBookstore($id);

    }


    public function updateBook()
    {
            $author = $_POST['author'];
            $title = $_POST['title'];
            $isbn = $_POST['isbn'];
            $id = $_POST['id'];

            $book = new Book($author, $title, $isbn, $id);
            $model = new ModelBookstore;
            $model->updateBookstore($book);
    }

    public function showAllBooks(){
        $model = new ModelBookstore;
        echo json_encode($model->getAllBooks());
    }
}

$controller = new ControllerBookstore;

if(isset($_GET['show_books'])) {
    $controller->showAllBooks();
}

else if (isset($_POST['operation'])){
        switch($_POST['operation']) {
            case "delete": {
                $controller->deleteBook();
                break;
            }
            case "save":{
                $controller->saveBook();
                break;
            }
            case "update":{
                $controller->updateBook();
                break;
            }
            default:{
                echo "Unknown operation";
                break;
            }
        }
}
?>
