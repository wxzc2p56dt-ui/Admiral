<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json; charset=utf-8");

if (!file_exists("sliders.json")) {
  echo "[]";
  exit;
}

echo file_get_contents("sliders.json");
