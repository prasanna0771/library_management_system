<?php
include_once 'db_handler.php';

class OfficeHandler extends Connection {
    // CRUD functions for books
    public function createBooks($book_id, $title, $author) {
        $sql = "INSERT INTO books (book_id, title, author) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('sss', $book_id, $title, $author);
        return $stmt->execute();
    }

    public function readBooks() {
        $sql = "SELECT * FROM books";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function updateBooks($book_id, $title, $author) {
        $sql = "UPDATE books SET title = ?, author = ? WHERE book_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('sss', $title, $author, $book_id);
        return $stmt->execute();
    }

    public function deleteBooks($book_id) {
        $sql = "DELETE FROM books WHERE book_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('s', $book_id);
        return $stmt->execute();
    }
    public function getbooksByCode($book_id) 
    { 
        $stmt = $this->conn->prepare("SELECT * FROM books WHERE book_id= ?"); $stmt->bind_param("s", $book_id); $stmt->execute(); 
        $result = $stmt->get_result(); 
        return $result->fetch_assoc(); 
    }  
    // CRUD functions for students
    public function createStudents($student_id, $studentname, $dept_id) {
        $sql = "INSERT INTO Students (student_id, studentname, dept_id) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('sss', $student_id, $studentname, $dept_id);
        return $stmt->execute();
    }

    public function readStudents() {
        $sql = "SELECT * FROM students";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function updateStudents($student_id, $studentname, $dept_id) {
        $sql = "UPDATE students SET studentname = ?, dept_id = ? WHERE student_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('sss', $studentname, $dept_id, $student_id);
        return $stmt->execute();
    }

    public function deleteStudents($student_id) {
        $sql = "DELETE FROM students WHERE student_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('s', $student_id);
        return $stmt->execute();
    }

    // CRUD functions for issued_books
    public function createIssued_books($book_id, $student_id, $dept_id, $issue_date, $return_date) {
        $sql = "INSERT INTO issued_books (book_id, student_id, dept_id, issue_date, return_date) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('sssss',$book_id, $student_id, $dept_id, $issue_date, $return_date);
        return $stmt->execute();
    }

    public function readIssued_books() {
        $sql = "SELECT * FROM issued_books";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function updateIssued_books($book_id, $student_id, $dept_id, $issue_date, $return_date) {
        $sql = "UPDATE issued_books SET book_id = ?, dept_id = ?, issue_date = ?, return_date = ? WHERE student_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('sssss',$book_id, $dept_id, $issue_date, $return_date, $student_id);
        return $stmt->execute();
    }

    public function deleteIssued_books($student_id) {
        $sql = "DELETE FROM issued_books WHERE student_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('s', $student_id);
        return $stmt->execute();
        }
    }
?>
