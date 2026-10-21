<?php
session_start();
require_once __DIR__ . '/includes/db.php';

if (isset($_GET['logout'])) {
    logoutUser();
    header('Location: index.php');
    exit;
}

if (isset($_SESSION['user_id'])) {
    header('Location: dashboard.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>AI Interview Login</title>
  <style>
    body { font-family: Arial, sans-serif; background: linear-gradient(135deg, #0f172a, #1e3a8a); color: white; padding: 48px; }
    .login-box { max-width: 420px; margin: 80px auto; background: rgba(255,255,255,0.08); padding: 28px; border-radius: 12px; }
    input, select, button { width: 100%; padding: 12px; margin-top: 10px; border-radius: 8px; border: none; }
    button { background: #60a5fa; color: #0f172a; font-weight: bold; cursor: pointer; }
    .small { margin-top: 16px; color: #dbeafe; }
  </style>
</head>
<body>
  <div class="login-box">
    <h2>AI Interview Preparation</h2>

    <?php if (isset($_SESSION['message'])): ?>
      <p><?= htmlspecialchars($_SESSION['message']); ?></p>
      <?php unset($_SESSION['message']); ?>
    <?php endif; ?>

    <form action="api/auth.php" method="post">
      <input type="hidden" name="type" value="login" />
      <input type="email" name="email" placeholder="Email" required />
      <input type="password" name="password" placeholder="Password" required />
      <button type="submit">Login</button>
    </form>

    <form action="api/auth.php" method="post" style="margin-top: 18px;">
      <input type="hidden" name="type" value="register" />
      <input type="text" name="full_name" placeholder="Full Name" required />
      <input type="email" name="email" placeholder="Email" required />
      <input type="password" name="password" placeholder="Password" required />
      <button type="submit">Register</button>
    </form>
  </div>
</body>
</html>
