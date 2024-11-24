<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $confirm_password = htmlspecialchars($_POST['confirm_password']);
    $job = htmlspecialchars($_POST['job']);
    $dob = htmlspecialchars($_POST['dob']);
    $place = htmlspecialchars($_POST['place']);
    $subject = htmlspecialchars($_POST['subject']);
    $gender = htmlspecialchars($_POST['gender']);
    $phone = htmlspecialchars($_POST['phone']);
    $address = htmlspecialchars($_POST['address']);
    $about = htmlspecialchars($_POST['about']);

    if ($password === $confirm_password) {
        $_SESSION['users'][] = [
            'email' => $email,
            'password' => $password,
            'name' => $name,
            'job' => $job,
            'dob' => $dob,
            'place' => $place,
            'subject' => $subject,
            'gender' => $gender,
            'phone' => $phone,
            'address' => $address,
            'about' => $about,
        ];

        header("Location: login.php");
        exit;
    } else {
        $error = "Passwords do not match!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
</head>
<body>
<h2>Registration</h2>
<?php if (!empty($error)): ?>
    <p style="color: red;"><?php echo htmlspecialchars($error); ?></p>
<?php endif; ?>
<form method="POST" action="">
    <label for="name">Name: *</label>
    <input type="text" name="name" id="name" required><br><br>
    <label for="email">Email: *</label>
    <input type="email" name="email" id="email" required><br><br>
    <label for="password">Password: *</label>
    <input type="password" name="password" id="password" required><br><br>
    <label for="confirm_password">Confirm Password: *</label>
    <input type="password" name="confirm_password" id="confirm_password" required><br><br>
    <label for="dob">D.O.B:</label>
    <input type="date" id="dob" name="dob" required><br><br>
    <label>Gender:</label>
    <input type="radio" name="gender" value="Male" required> Male
    <input type="radio" name="gender" value="Female"> Female<br><br>
    <label for="place">Place:</label>
    <select id="place" name="place">
        <option value="Dhaka">Dhaka</option>
        <option value="Chittagong">Chittagong</option>
        <option value="Sylhet">Sylhet</option>
    </select><br><br>
    <label for="phone">Phone:</label>
    <input type="text" name="phone" id="phone" value="+880" required><br><br>
    <label for="address">Address:</label>
    <textarea name="address" id="address" rows="4" cols="50"></textarea><br><br>
    <label for="about">About Yourself:</label>
    <textarea name="about" id="about" rows="5" cols="50"></textarea><br><br>
    <label>Job:</label>
    <input type="radio" name="job" value="Student" required> Student
    <input type="radio" name="job" value="Teacher"> Teacher<br><br>
    <label for="subject">Favorite Subject:</label>
    <select id="subject" name="subject">
        <option value="OOAD">OOAD</option>
        <option value="Database">Database</option>
        <option value="AI">AI</option>
    </select><br><br>
    <button type="submit">Register</button>
</form>
</body>
</html>
