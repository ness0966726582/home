<?php
require 'config.php'; // 連接資料庫

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $account = trim($_POST['account']);
    $password = trim($_POST['password']);
    $email = trim($_POST['email']);

    // 🔹 檢查輸入是否為空
    if (empty($account) || empty($password) || empty($email)) {
        die("<p style='color: red;'>❌ 錯誤: 所有欄位皆為必填！</p>");
    }

    // 🔹 檢查帳號是否已存在
    try {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE account = :account");
        $stmt->execute(['account' => $account]);
        $existingUser = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die("<p style='color: red;'>❌ 查詢錯誤：" . $e->getMessage() . "</p>");
    }

    if ($existingUser) {
        die("<p style='color: red;'>❌ 該帳號已存在，請使用其他帳號！</p>");
    }

    // 🔹 加密密碼
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // 🔹 插入新帳號
    try {
        $stmt = $pdo->prepare("INSERT INTO users (account, password, email) VALUES (:account, :password, :email)");
        $stmt->execute(['account' => $account, 'password' => $hashedPassword, 'email' => $email]);

        echo "<p style='color: green;'>✅ 註冊成功！請 <a href='login.html'>點此登入</a></p>";
    } catch (PDOException $e) {
        die("<p style='color: red;'>❌ 註冊失敗：" . $e->getMessage() . "</p>");
    }
}
?>
