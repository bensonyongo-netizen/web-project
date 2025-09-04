
<?php
require __DIR__ . '/db.php';

$username = 'admin';
$password = 'admin123';
$hash = password_hash($password, PASSWORD_BCRYPT);

$pdo->exec("CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    password_hash VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");

$stmt = $pdo->prepare("SELECT id FROM users WHERE username = ?");
$stmt->execute([$username]);
if (!$stmt->fetch()) {
  $ins = $pdo->prepare("INSERT INTO users (username, password_hash) VALUES (?, ?)");
  $ins->execute([$username, $hash]);
  echo "Seeded default admin user. Username: $username  Password: $password";
} else {
  echo "Admin user already exists.";
}
