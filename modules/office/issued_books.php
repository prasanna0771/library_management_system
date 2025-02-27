<?php
include '../../includes/common.php';
 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_POST['action'];
    $student_id = $_POST['student_id'];
    $book_id = isset($_POST['book_id']) ? $_POST['book_id'] : "";
    $dept_id = isset($_POST['dept_id']) ? $_POST['dept_id'] : ""; 
    $issue_date = isset($_POST['issue_date']) ? $_POST['issue_date'] : ""; 
    $return_date = isset($_POST['return_date']) ? $_POST['return_date'] : ""; 

    if ($action == 'create') {
        $res= $officeHandler->createIssued_books($book_id, $student_id, $dept_id, $issue_date, $return_date);
        if($res!=0)
        $_SESSION['alert'] = ['type' => 'success', 'message' => ' row added successfully.'];
    else
         $_SESSION['alert'] = ['type' => 'danger', 'message' => 'Error:  row is not inserted!Try Again.'];
  
    } elseif ($action == 'update') {
        $officeHandler->updateIssued_books($book_id, $student_id, $dept_id, $issue_date, $return_date);
        $_SESSION['alert'] = ['type' => 'info', 'message' => ' updated successfully.'];
   
    } elseif ($action == 'delete') {
        $officeHandler->deleteIssued_books($student_id);
        $_SESSION['alert'] = ['type' => 'danger', 'message' => ' deleted successfully.'];

    }
}

$issued_books = $officeHandler->readIssued_books();
include 'views/vw_issued_books.php';
?>
