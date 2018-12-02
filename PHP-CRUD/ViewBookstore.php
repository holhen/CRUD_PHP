<?php

require_once 'ControllerBookstore.php';
require_once 'Book.php';


class ViewBookstore extends ControllerBookstore
{

    public function saveBook()
    {
            $author = $_POST['author'];
            $title = $_POST['title'];
            $isbn = $_POST['isbn'];

            $book = new Book($author, $title, $isbn, 0);
            $id=$this->insertIntoBookstore($book);
            $book->id=$id;

            if($id != 0){
                echo json_encode($book);
            }

    }

    public function deleteBook()
    {
            $id = $_POST['id'];
            $this->deleteFromBookstore($id);

    }


    public function updateBook()
    {
            $author = $_POST['author'];
            $title = $_POST['title'];
            $isbn = $_POST['isbn'];
            $id = $_POST['id'];

            $book = new Book($author, $title, $isbn, $id);
            $this->updateBookstore($book);
    }

    public function showAllBooks(){
        echo json_encode($this->getAllBooks());
    }
}

$view = new ViewBookstore();

if(isset($_GET['show_books'])) {
    $view->showAllBooks();
}

else if (isset($_POST['operation'])){
        switch($_POST['operation']) {
            case "delete": {
                $view->deleteBook();
                break;
            }
            case "save":{
                $view->saveBook();
                break;
            }
            case "update":{
                $view->updateBook();
                break;
            }
            default:{
                echo "Unknown operation";
                break;
            }
        }
}
?>
