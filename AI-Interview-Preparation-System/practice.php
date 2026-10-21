<?php
session_start();
require_once __DIR__ . '/includes/db.php';
redirectIfNotLoggedIn();

$category = $_GET['category'] ?? 'backend';
$difficulty = $_GET['difficulty'] ?? 'medium';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Practice Interview</title>
  <style>
    body { font-family: Arial, sans-serif; background: #eef2ff; padding: 32px; }
    .container { max-width: 800px; margin: 0 auto; background: #fff; padding: 32px; border-radius: 12px; }
    textarea { width: 100%; height: 180px; padding: 12px; }
    button { background: #3b82f6; color: white; padding: 12px 18px; border: none; border-radius: 8px; cursor: pointer; }
  </style>
</head>
<body>
  <div class="container">
    <h2>Interview Practice</h2>
    <p>Category: <strong><?= htmlspecialchars($category) ?></strong> | Difficulty: <strong><?= htmlspecialchars($difficulty) ?></strong></p>

    <ol>
      <li>Describe your approach to designing scalable systems.</li>
      <li>How do you handle performance bottlenecks during deployment?</li>
      <li>Explain a technical challenge you solved in a previous project.</li>
    </ol>

    <form id="answerForm">
      <textarea id="answer" placeholder="Write your answer here..."></textarea><br><br>
      <button type="submit">Submit Answer</button>
    </form>

    <div id="result" style="margin-top: 20px;"></div>
  </div>

  <script>
    document.getElementById('answerForm').addEventListener('submit', function (e) {
      e.preventDefault();
      const answer = document.getElementById('answer').value;

      fetch('api/evaluate_answer.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: 'answer=' + encodeURIComponent(answer)
      })
      .then(res => res.json())
      .then(data => {
        document.getElementById('result').innerHTML = `
          <h3>Feedback</h3>
          <p>Score: ${data.score}/10</p>
          <p>${data.feedback}</p>
        `;
      });
    });
  </script>
</body>
</html>
