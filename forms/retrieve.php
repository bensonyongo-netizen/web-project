
<?php
require __DIR__ . '/db.php';

// If not logged in, show login form inline (per requirement to place login on this page)
if (!isset($_SESSION['user_id'])): ?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Retrieve Records — Login Required</title>
  <link rel="stylesheet" href="../assets/css/styles.css" />
</head>
<body>
  <main class="container">
    <h1>View Submissions</h1>
    <p class="small">Login to access the information retrieved from the database.</p>
    <form action="login.php" method="post">
      <label for="username">Username</label>
      <input id="username" name="username" required />
      <label for="password">Password</label>
      <input id="password" type="password" name="password" required />
      <button type="submit" class="button">Login</button>
    </form>
    <p><a href="../index.html">&larr; Back to Home</a></p>
  </main>
</body>
</html>
<?php exit; endif; ?>

<?php
// Logged in: fetch records
$stmt = $pdo->query("SELECT id, full_name, email, phone, program, message, created_at FROM submissions ORDER BY created_at DESC");
$rows = $stmt->fetchAll();
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Retrieve Records</title>
  <link rel="stylesheet" href="../assets/css/styles.css" />
</head>
<body>
  <main class="container">
    <h1>Saved Submissions</h1>
    <p class="small">Only authenticated users can see this data. <a href="logout.php">Logout</a></p>
    <table>
      <thead>
        <tr><th>#</th><th>Name</th><th>Email</th><th>Phone</th><th>Programme</th><th>Message</th><th>Created</th></tr>
      </thead>
      <tbody>
        <?php foreach ($rows as $i => $r): ?>
          <tr>
            <td><?php echo $i+1; ?></td>
            <td><?php echo htmlspecialchars($r['full_name']); ?></td>
            <td><?php echo htmlspecialchars($r['email']); ?></td>
            <td><?php echo htmlspecialchars($r['phone']); ?></td>
            <td><?php echo htmlspecialchars($r['program']); ?></td>
            <td><?php echo nl2br(htmlspecialchars($r['message'])); ?></td>
            <td><?php echo htmlspecialchars($r['created_at']); ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    <p><a href="../index.html">&larr; Back to Home</a></p>
  </main>
</body>
</html>
