<?php
if(!isset($_SESSION))
    session_start();
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">vsmlibrary</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home  </span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="/library/library/modules/office/books.php">Books </span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="/library/library/modules/office/students.php">Students </span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="/library/library/modules/office/issued_books.php">Issued_books </span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="/library/library/logout.php">Logout  </span></a>
            </li>
        </ul>
        ,<?php 
        if( isset($_SESSION['username']))
        echo "<h5> Welcome..,". $_SESSION['username']."</h5>";?>   
    </div>
</nav>
