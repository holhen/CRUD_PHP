<?php

require_once '../Conf/Dbh.php';

class ModelBookstore
{
    public function getAllBooks(){
        $books = null;
        $stmt = Dbh::connect()->query("SELECT * FROM bookstore")->fetchAll();
        if($stmt){
            foreach ($stmt as $row){
                $books[] = $row;
            }

        }
        return $books;
    }

    public function insertIntoBookstore($book){
        if(!$this->getID($book)) {
            $stmt = Dbh::connect()->prepare("INSERT INTO bookstore (author, title, isbn) VALUES (?, ?, ?)");
            $stmt->execute([$book->author, $book->title, $book->isbn]);
            return $this->getID($book);
        }
        return 0;
    }

    public function deleteFromBookstore($id){
        $stmt = Dbh::connect()->prepare("DELETE FROM bookstore WHERE id=?");
        $stmt->execute([$id]);
    }

    public function getID($book){
        $stmt = Dbh::connect()->prepare("SELECT id FROM bookstore WHERE author = ? AND title = ? AND isbn = ?");
        $stmt->execute([$book->author, $book->title, $book->isbn]);
        return $stmt->fetchColumn();
    }

    public function updateBookstore($book){
        $stmt = Dbh::connect()->prepare("UPDATE bookstore SET author = ?, title = ?, ISBN = ? WHERE id=?");
        $stmt->execute([$book->author,$book->title,$book->isbn,$book->id]);
    }
}