<?php
session_start();
session_destroy();
echo "<script>alert('Anda telah keluar dari Akun Anda | BooksStore'); window.location='index.php?buku=all' </script>";
?>