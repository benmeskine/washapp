<?php
require 'db.php'; // الاتصال بقاعدة البيانات

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // استقبال البيانات من نموذج التسجيل
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    // تشفير كلمة المرور
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // إعداد استعلام إدخال المستخدم
    $sql = "INSERT INTO users (username, email, password, role) VALUES (:username, :email, :password, :role)";
    $stmt = $conn->prepare($sql);

    // ربط البيانات
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $hashed_password); // استخدام كلمة المرور المشفرة
    $stmt->bindParam(':role', $role);
    
    //error here 
    &$sql = ("INSERT INTO `user`(`id`, `name`, `email`, `password`, `phone`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]')")

    // تنفيذ الاستعلام
    if ($stmt->execute()) {
        echo "تم التسجيل بنجاح!";
    } else {
        echo "حدث خطأ أثناء التسجيل.";
    }
}
?>
