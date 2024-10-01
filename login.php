<?php
require 'db.php'; // الاتصال بقاعدة البيانات
session_start(); // بدء الجلسة

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // البحث عن المستخدم بناءً على البريد الإلكتروني
    $sql = "SELECT * FROM users WHERE email = :email";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    // التحقق مما إذا كان المستخدم موجود
    if ($stmt->rowCount() > 0) {
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // التحقق من تطابق كلمة المرور
        if (password_verify($password, $user['password'])) {
            // إعداد الجلسة بعد تسجيل الدخول الناجح
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];

            echo "تسجيل الدخول ناجح! مرحباً " . $user['username'];
        } else {
            echo "كلمة المرور غير صحيحة.";
        }
    } else {
        echo "البريد الإلكتروني غير موجود.";
    }
}
?>
