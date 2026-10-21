<?php
session_start();
require_once __DIR__ . '/includes/db.php';
redirectIfNotLoggedIn();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>AI Interview Dashboard</title>
  <style>
    body { font-family: Arial, sans-serif; background: #f5f7fb; margin: 0; padding: 32px; }
    .container { max-width: 900px; margin: 0 auto; }
    .card { background: #fff; padding: 28px; border-radius: 12px; box-shadow: 0 8px 24px rgba(0,0,0,0.08); }
    .nav { display: flex; justify-content: space-between; margin-bottom: 24px; }
    a { text-decoration: none; color: #2457f5; }
  </style>
</head>
<body>
  <div class="container">
    <div class="nav">
      <h2>AI Interview Prep</h2>
      <a href="index.php?logout=1">Logout</a>
    </div>
    <div class="card">
      <h3>Welcome to your dashboard</h3>
      <p>Select an interview category and begin your session.</p>
      <form action="practice.php" method="get">
        <label>Category:</label>
        <select name="category">
          <option value="backend">Backend Development</option>
          <option value="frontend">Frontend Development</option>
          <option value="data">Data & Analytics</option>
          <option value="hr">HR Interview</option>
        </select>
        <br><br>
        <label>Difficulty:</label>
        <select name="difficulty">
          <option value="easy">Easy</option>
          <option value="medium" selected>Medium</option>
          <option value="hard">Hard</option>
        </select>
        <br><br>
        <button type="submit">Start Practice</button>
      </form>
    </div>
  </div>
</body>
</html>
