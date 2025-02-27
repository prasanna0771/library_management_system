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
    <h2>books info </h2>
    <form id="booksForm" method="post" action="books.php" class="mb-3">
        
        <div class="mb-3">
            <label for="book_id" class="form-label">Book Id </label>
            <input type="text" class="form-control" id="book_id" name="book_id" required>
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Book Title </label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="mb-3">
            <label for="author" class="form-label">Book Author </label>
            <input type="text" class="form-control" id="author" name="author" required>
        </div>
        <input type="hidden" name="action" id="action" value="create">
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th> Book Id</th>
                <th>Book Title </th>
                <th>Book Author </th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($books as $book): ?>
                <tr>
                    <td><?php echo $book['book_id']; ?></td>
                    <td><?php echo $book['title']; ?></td>
                    <td><?php echo $book['author']; ?></td>
<td>
 <button class="btn btn-sm btn-warning edit-btn" data-book_id="<?php echo $book['book_id']; ?>">Edit</button>
                       
  <form method="post" action="books.php" style="display:inline;">
    <input type="hidden" name="book_id" value="<?php echo $book['book_id']; ?>">
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
        const book_id = this.getAttribute('data-book_id');
        const row = this.closest('tr');
        const title = row.cells[1].textContent;
        const author = row.cells[2].textContent;

        document.getElementById('book_id').value = book_id;
        document.getElementById('title').value = title;
        document.getElementById('author').value = author;
        document.getElementById('action').value = 'update';
    });
});
</script>
</body>
</html>
