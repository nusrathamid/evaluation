<?php
session_start();

if (!isset($_SESSION['current_user'])) {
    header("Location:login.php");
    exit;
}

$user = $_SESSION['current_user'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
</head>
<body>
<h2>Profile</h2>
<p><strong>Name:</strong> <?php echo htmlspecialchars($user['name']); ?></p>
<p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
<p><strong>Job:</strong> <?php echo htmlspecialchars($user['job']); ?></p>
<p><strong>D.O.B:</strong> <?php echo htmlspecialchars($user['dob']); ?></p>
<p><strong>Place:</strong> <?php echo htmlspecialchars($user['place']); ?></p>
<p><strong>Subject:</strong> <?php echo htmlspecialchars($user['subject']); ?></p>
<p><strong>Gender:</strong> <?php echo htmlspecialchars($user['gender']); ?></p>
<p><strong>Phone:</strong> <?php echo htmlspecialchars($user['phone']); ?></p>
<p><strong>Address:</strong> <?php echo htmlspecialchars($user['address']); ?></p>
<p><strong>About Yourself:</strong> <?php echo htmlspecialchars($user['about']); ?></p>
<a href="logout.php">Logout</a>
</body>
</html>
