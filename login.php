<?php
session_start();
require_once 'config.php';

try {
    $conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $stmt = $conn->prepare("SELECT * FROM users WHERE username = :username AND password = :password");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
        
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($user) {
            // Nếu tồn tại user, thiết lập session
            $_SESSION['username'] = $username;
            header("Location: dashboard.php");
            exit();
        } else {
            // Xử lý khi đăng nhập thất bại
            echo "Sai tên đăng nhập hoặc mật khẩu.";
        }
    }
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>