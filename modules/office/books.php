<?php
include '../../includes/common.php';
 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_POST['action'];
    $book_id = $_POST['book_id'];
    $title = isset($_POST['title']) ? $_POST['title'] : "";
    $author = isset($_POST['author']) ? $_POST['author'] : ""; 

    if ($action == 'create') {
        $res= $officeHandler->createBooks($book_id, $title, $author);
        if($res!=0)
        $_SESSION['alert'] = ['type' => 'success', 'message' => 'new book added successfully.'];
    else
         $_SESSION['alert'] = ['type' => 'danger', 'message' => 'Error:book is not inserted!Try Again.'];
  
    } elseif ($action == 'update') {
        $officeHandler->updateBooks($book_id, $title, $author);
        $_SESSION['alert'] = ['type' => 'info', 'message' => 'book updated successfully.'];
   
    } elseif ($action == 'delete') {
        $officeHandler->deleteBooks($book_id);
        $_SESSION['alert'] = ['type' => 'danger', 'message' => 'book deleted successfully.'];

    }
}

$books = $officeHandler->readBooks();
include 'views/vw_books.php';
?>
