<?php
session_start();
session_destroy();
header("Location: login.html"); // 🔹 登出後回到登入頁
exit;
?>
