<?php
// معلومات الاتصال بقاعدة البيانات
$host = '127.0.0.1'; // اسم الخادم
$db   = 'carwash'; // اسم قاعدة البيانات
$user = 'root'; // اسم المستخدم
$pass = ''; // كلمة المرور (اتركها فارغة إذا لم تكن هناك كلمة مرور)

try {
    // إنشاء اتصال PDO
    $conn = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    
    // تحديد وضع الخطأ لـ PDO إلى استثناءات
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // رسالة نجاح
    echo "تم الاتصال بنجاح بقاعدة البيانات!";
} catch (PDOException $e) {
    // في حالة حدوث خطأ
    die("فشل الاتصال بقاعدة البيانات.");
    exit();
}
?>
