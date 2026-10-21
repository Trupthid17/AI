<?php
header('Content-Type: application/json');
require_once __DIR__ . '/../config/db.php';

$category = $_POST['category'] ?? 'backend';
$difficulty = $_POST['difficulty'] ?? 'medium';
$experience = $_POST['experience'] ?? '1-3 years';

$questions = [
    "Describe your approach to writing clean and maintainable code in a team project.",
    "How would you optimize a slow database query in a real-world web application?",
    "What is the difference between asynchronous and synchronous processing?",
    "Explain a project where you handled scalability or performance bottlenecks.",
    "How do you debug a production issue under time pressure?"
];

$response = [
    'category' => $category,
    'difficulty' => $difficulty,
    'experience' => $experience,
    'questions' => $questions,
];

echo json_encode($response);
