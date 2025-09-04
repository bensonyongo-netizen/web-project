
<?php
require __DIR__ . '/db.php';

// Very basic validation/sanitization
function clean($v){ return trim($v ?? ''); }

$name = clean($_POST['full_name'] ?? '');
$email = clean($_POST['email'] ?? '');
$phone = clean($_POST['phone'] ?? '');
$program = clean($_POST['program'] ?? '');
$message = clean($_POST['message'] ?? '');

if ($name === '' || $email === '' || $program === '') {
    http_response_code(422);
    echo "<p>Missing required fields. <a href='form.html'>Go back</a></p>";
    exit;
}

try {
    $stmt = $pdo->prepare("INSERT INTO submissions (full_name, email, phone, program, message) VALUES (?,?,?,?,?)");
    $stmt->execute([$name, $email, $phone, $program, $message]);
} catch (Exception $e) {
    http_response_code(500);
    echo "Insert failed: " . htmlspecialchars($e->getMessage());
    exit;
}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Submission Received</title>
  <link rel="stylesheet" href="../assets/css/styles.css" />
</head>
<body>
  <main class="container">
    <h1>Thank you, <?php echo htmlspecialchars($name); ?>!</h1>
    <p>Your information has been saved.</p>
    <p><a class="button" href="form.html">Submit another</a> <a class="button secondary" href="../index.html">Go Home</a></p>
  </main>
</body>
</html>
