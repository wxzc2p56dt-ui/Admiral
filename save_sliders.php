<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json; charset=utf-8");

$data = file_get_contents("php://input");

if (!$data) {
  http_response_code(400);
  echo json_encode(["error" => "No data received"]);
  exit;
}

if (file_put_contents("sliders.json", $data) === false) {
  http_response_code(500);
  echo json_encode(["error" => "Failed to save file"]);
  exit;
}

echo json_encode(["success" => true]);
