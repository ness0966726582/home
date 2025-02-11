<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.html");
    exit;
}
?>

<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard 內嵌頁面</title>
    <link rel="stylesheet" href="style.css">  <!-- 🔹 引入完整 CSS -->
</head>
<body>
    <div class="header">
        <h1>Dashboard 內嵌頁面</h1>
        <a href="logout.php" class="logout-button">登出</a>
    </div>
    <div class="container">
        <div class="sidebar">
            <a href="http://10.231.220.145:8080/home/dashboard.php">🏠 首頁</a>
            <a href="http://10.231.220.207:3000/public/dashboard/68fea43f-9b4c-4856-97d2-ec359b8ff668">📊 BI報表</a>
            <a href="#">⚙ 設定</a>
        </div>
        <div class="content">
            <iframe src="http://10.231.220.207:3000/public/dashboard/68fea43f-9b4c-4856-97d2-ec359b8ff668"></iframe>
        </div>
    </div>
</body>
</html>
