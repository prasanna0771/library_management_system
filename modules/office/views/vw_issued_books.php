<?php
include("../../includes/head.php");
include '../../includes/menubar.php';
 
if (isset($_SESSION['alert'])) {
    $alert = $_SESSION['alert'];
    unset($_SESSION['alert']);
?>
    <div class="container mt-3">
        <div class="alert alert-<?php echo $alert['type'];?> alert-dismissible fade show" role="alert">
            <?php echo $alert['message']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
<?php } ?>
 
<div class="container mt-5">
    <h2>book issued info</h2>
    <form id="issue_tableForm" method="post" action="issued_books.php" class="mb-3">
        <div class="mb-3">
            <label for="book_id" class="form-label">Book Id</label>
            <input type="text" class="form-control" id="book_id" name="book_id" required>
        </div>
        <div class="mb-3">
            <label for="student_id" class="form-label">Student Id</label>
            <input type="text" class="form-control" id="student_id" name="student_id" required>
        </div>
        <div class="mb-3">
            <label for="dept_id" class="form-label">Dept Id </label>
            <input type="text" class="form-control" id="dept_id" name="dept_id" required>
        </div>
        <div class="mb-3">
            <label for="issue_date" class="form-label"> Issue Date </label>
            <input type="date" class="form-control" id="issue_date" name="issue_date" required>
        </div>
        <div class="mb-3">
            <label for="return_date" class="form-label">Return Date </label>
            <input type="date" class="form-control" id="return_date" name="return_date" required>
        </div>
        <input type="hidden" name="action" id="action" value="create">
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Book Id</th>
                <th>Student Id</th>
                <th>Dept Id</th>
                <th> Issue Date</th>
                <th>Return Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($issued_books as $ibooks): ?>
                <tr>
                    <td><?php echo $ibooks['book_id']; ?></td>
                    <td><?php echo $ibooks['student_id']; ?></td>
                    <td><?php echo $ibooks['dept_id']; ?></td>
                    <td><?php echo $ibooks['issue_date']; ?></td>
                    <td><?php echo $ibooks['return_date']; ?></td>
<td>
 <button class="btn btn-sm btn-warning edit-btn" data-student_id="<?php echo $ibooks['student_id']; ?>">Edit</button>
                       
  <form method="post" action="issued_books.php" style="display:inline;">
    <input type="hidden" name="student_id" value="<?php echo $ibooks['student_id']; ?>">
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
        const book_id = row.cells[1].textContent;
        const dept_id = row.cells[2].textContent;
        const issue_date = row.cells[3].textContent;
        const return_date= row.cells[4].textContent;

        document.getElementById('book_id').value = book_id;
        document.getElementById('student_id').value = student_id;
        document.getElementById('dept_id').value = dept_id;
         document.getElementById('issue_date').value = issue_date;
        document.getElementById('return_date').value = return_date;
        document.getElementById('action').value = 'update';
    });
});
</script>
</body>
</html>
