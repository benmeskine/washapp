<?php
session_start(); // بدء الجلسة
session_destroy(); // تدمير الجلسة
header("Location: login.php"); // إعادة التوجيه إلى صفحة تسجيل الدخول
exit;
?>
