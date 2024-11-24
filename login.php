<?php
session_start();

if (isset($_SESSION['current_user'])) {
    header("Location:profile.php");
    exit;
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email format.";
    } else {
        if (isset($_SESSION['users'])) {
            foreach ($_SESSION['users'] as $user) {
                if ($user['email'] === $email && $user['password'] === $password) {
                    
                    $_SESSION['current_user'] = $user;
                    header("Location:profile.php"); 
                    exit;
                }
            }
        }

        $error = "Invalid email or password. Please register.";
        header("Location:../registration.php?error=" . urlencode($error));
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
<h2>Login</h2>
<?php if (isset($error)): ?>
    <p style="color: red;"><?php echo htmlspecialchars($error); ?></p>
<?php endif; ?>
<form method="POST" action="">
    <label for="email">Email: <span style="color: red;">*</span></label>
    <input type="email" name="email" id="email" required><br><br>
    <label for="password">Password:<span style="color: red;">*</span></label></label>
    <input type="password" name="password" id="password" required><br><br>
    <button type="submit">Login</button>
</form>
</body>
</html>
