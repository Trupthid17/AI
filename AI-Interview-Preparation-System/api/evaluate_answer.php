<?php
header('Content-Type: application/json');

$answer = $_POST['answer'] ?? '';

if (trim($answer) === '') {
    echo json_encode(['score' => 0, 'feedback' => 'Please provide an answer.']);
    exit;
}

$wordCount = str_word_count($answer);
$score = min(10, max(0, (int) round($wordCount / 20)));

$feedback = [
    'Strong structure and clear understanding are visible.',
    'You can improve by adding more examples and technical depth.',
    'Try to mention trade-offs, edge cases, and real-world usage.'
];

echo json_encode([
    'score' => $score,
    'feedback' => $feedback[array_rand($feedback)],
    'word_count' => $wordCount,
]);
