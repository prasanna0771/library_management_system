<?php
include("../../includes/head.php");
include '../../includes/menubar.php';
 
if (isset($_SESSION['alert'])):
    $alert = $_SESSION['alert'];
    unset($_SESSION['alert']);
?>
    <div class="container mt-3">
        <div class="alert alert-<?php echo $alert['type']; ?> alert-dismissible fade show" role="alert">
            <?php echo $alert['message']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
<?php endif; ?>

<div class="container mt-5">
    <h2>Student Management</h2>
    <form id="studentForm" method="post" action="students.php" class="mb-3">
        <div class="mb-3">
            <label for="student_id" class="form-label"> Student Id</label>
            <input type="text" class="form-control" id="student_id" name="student_id" required>
        </div>
        <div class="mb-3">
            <label for="studentname" class="form-label">Student Name</label>
            <input type="text" class="form-control" id="studentname" name="studentname" required>
        </div>
        <div class="mb-3">
            <label for="dept_id" class="form-label">Department Id</label>
            <input type="text" class="form-control" id="dept_id" name="dept_id" required>
        </div>
       
        
        <input type="hidden" name="action" id="action" value="create">
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Student Id</th>
                <th>Student Name</th>
                <th> Department Id </th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($students as $student): ?>
                <tr>
                    <td><?php echo $student['student_id']; ?></td>
                    <td><?php echo $student['studentname']; ?></td>
                    <td><?php echo $student['dept_id']; ?></td>
                    <td>
                        <button class="btn btn-sm btn-warning edit-btn" data-student_id="<?php echo $student['student_id']; ?>">Edit</button>
                        <form method="post" action="students.php" style="display:inline;">
                            <input type="hidden" name="student_id" value="<?php echo $student['student_id']; ?>">
                            <input type="hidden" name="action" value="delete">
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php
include '../../includes/footerjs.php';
include '../../includes/footer.php';
?>
 
<script>
    document.querySelectorAll('.edit-btn').forEach(button => {
        button.addEventListener('click', function() {
            const student_id = this.getAttribute('data-student_id');
            const row = this.closest('tr');
            const studentname = row.cells[1].textContent;
            const dept_id = row.cells[2].textContent;

            document.getElementById('student_id').value = student_id;
            document.getElementById('studentname').value = studentname;
            document.getElementById('dept_id').value = dept_id;
            document.getElementById('action').value = 'update';

            $('#dept_id').trigger('change');
        });
    });

</script>
</body>
</html>
