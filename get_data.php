<?php
header('Content-Type: application/json');
$conn = new mysqli("localhost", "admiral_user", "admpass", "admiral_db");
if ($conn->connect_error) {
    die(json_encode(["error" => "Ошибка подключения: " . $conn->connect_error]));
}

$result = $conn->query("SELECT id, department, parent_name, child_name, phone, birth_date, created_at FROM registrations");
$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}
echo json_encode($data);
$conn->close();
?>
