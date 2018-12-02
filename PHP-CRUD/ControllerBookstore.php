<?php

require_once 'ModelBookstore.php';

class ControllerBookstore extends ModelBookstore
{
    protected function getAllBooks(){
        $books = null;
        $stmt = $this->connect()->query("SELECT * FROM bookstore")->fetchAll();
        if($stmt){
            foreach ($stmt as $row){
                $books[] = $row;
            }

        }
        return $books;
    }

    protected function insertIntoBookstore($book){
        if(!$this->getID($book)) {
            $stmt = $this->connect()->prepare("INSERT INTO bookstore (author, title, isbn) VALUES (?, ?, ?)");
            $stmt->execute([$book->author, $book->title, $book->isbn]);
            return $this->getID($book);
        }
        return 0;
    }

    protected function deleteFromBookstore($id){
        $stmt = $this->connect()->prepare("DELETE FROM bookstore WHERE id=?");
        $stmt->execute([$id]);
    }

    protected function getID($book){
        $stmt = $this->connect()->prepare("SELECT id FROM bookstore WHERE author = ? AND title = ? AND isbn = ?");
        $stmt->execute([$book->author, $book->title, $book->isbn]);
        return $stmt->fetchColumn();
    }

    protected function updateBookstore($book){
        $stmt = $this->connect()->prepare("UPDATE bookstore SET author = ?, title = ?, ISBN = ? WHERE id=?");
        $stmt->execute([$book->author,$book->title,$book->isbn,$book->id]);
    }
}