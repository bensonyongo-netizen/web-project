
<?php
require __DIR__ . '/db.php';

// If already logged in, redirect
if (isset($_SESSION['user_id'])) {
    header('Location: retrieve.php');
    exit;
}

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');
    if ($username && $password) {
        $stmt = $pdo->prepare("SELECT id, username, password_hash FROM users WHERE username = ?");
        $stmt->execute([$username]);
        $row = $stmt->fetch();
        if ($row && password_verify($password, $row['password_hash'])) {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            header('Location: retrieve.php');
            exit;
        } else {
            $error = 'Invalid credentials';
        }
    } else {
        $error = 'Please enter username and password';
    }
}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Login</title>
  <link rel="stylesheet" href="../assets/css/styles.css" />
</head>
<body>
  <main class="container">
    <h1>Restricted Area</h1>
    <p class="small">Part 5b: Login form to access retrieved information.</p>
    <?php if ($error): ?>
      <p style="color:#b91c1c;"><?php echo htmlspecialchars($error); ?></p>
    <?php endif; ?>
    <form action="login.php" method="post">
      <label for="username">Username</label>
      <input id="username" name="username" required />

      <label for="password">Password</label>
      <input type="password" id="password" name="password" required />

      <button type="submit" class="button">Login</button>
    </form>
    <p class="small">Default credentials (after seeding): <code>admin</code> / <code>admin123</code></p>
    <p><a href="../index.html">&larr; Back to Home</a></p>
  </main>
</body>
</html>
