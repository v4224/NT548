<?php
// Bắt đầu session để truy cập thông tin người dùng
session_start();

// Kiểm tra xem người dùng đã đăng nhập chưa
if (!isset($_SESSION['username'])) {
    // Nếu chưa đăng nhập, chuyển hướng người dùng về trang login.php
    header("Location: login.php");
    exit();
}

// Hiển thị thông điệp chào mừng
echo "Hello, " . $_SESSION['username'] . "!<br>";
echo "Hello World!";
?>