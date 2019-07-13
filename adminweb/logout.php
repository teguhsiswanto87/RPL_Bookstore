<?php
session_start();
session_destroy();
echo "<script>alert('Anda telah keluar dari Administrator | BooksStore'); window.location='../' </script>";
?>