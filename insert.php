<?php
header("Content-Type: text/plain; charset=utf-8");

// Подключение к базе
$conn = new mysqli("localhost", "admiral_user", "admpass", "admiral_db");
if ($conn->connect_error) {
    die("❌ Ошибка подключения: " . $conn->connect_error);
}

// Получение данных из формы
$parent_name = $_POST['parent_name'] ?? '';
$phone = $_POST['phone'] ?? '';
$child_name = $_POST['child_name'] ?? '';
$birth_date = $_POST['birth_date'] ?? '';
$department = $_POST['department'] ?? '';

// Проверка обязательных полей
if (!$parent_name || !$phone || !$child_name || !$birth_date) {
    die("⚠ Заполните все обязательные поля");
}

// Подготовленный запрос для защиты от SQL-инъекций
$stmt = $conn->prepare("INSERT INTO registrations (department, parent_name, phone, child_name, birth_date) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $department, $parent_name, $phone, $child_name, $birth_date);

if ($stmt->execute()) {
    echo "✅ Данные успешно сохранены!";
} else {
    echo "❌ Ошибка сохранения: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
