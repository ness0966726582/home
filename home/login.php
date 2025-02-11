<?php
session_start();
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $account = $_POST['account'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT password FROM users WHERE account = :account");
    $stmt->execute(['account' => $account]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user'] = $account;
        header("Location: dashboard.php");
        exit;
    } else {
        echo "❌ 帳號或密碼錯誤";
    }
}
?>
