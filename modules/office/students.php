<?php
include '../../includes/common.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_POST['action'];
    $student_id = $_POST['student_id'];
    $studentname = isset($_POST['studentname'])? $_POST['studentname']:"";
    $dept_id = isset($_POST['dept_id'])? $_POST['dept_id']:"";

    if ($action == 'create') {
        $officeHandler->createStudents($student_id, $studentname, $dept_id);
        $_SESSION['alert'] = ['type' => 'success', 'message' => 'Student added successfully.'];
    } elseif ($action == 'update') {
        $officeHandler->updateStudents($student_id, $studentname, $dept_id);
        $_SESSION['alert'] = ['type' => 'info', 'message' => 'Student updated successfully.']; 
    } elseif ($action == 'delete') {
        $officeHandler->deleteStudents($student_id);
        $_SESSION['alert'] = ['type' => 'danger', 'message' => 'Student deleted successfully.'];
    }
}

$books = $officeHandler->readBooks();
$students = $officeHandler->readStudents();
include 'views/vw_students.php';
?>
