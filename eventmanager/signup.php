<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $email = $_POST['email'];

    // Check if the username already exists
    $checkUserSql = "SELECT * FROM users WHERE username = '$username'";
    $checkUserResult = $conn->query($checkUserSql);

    if ($checkUserResult->num_rows == 0) {
        // Insert new user
        $insertUserSql = "INSERT INTO users (username, password, email, role) VALUES ('$username', '$password', '$email', 'user')";
        if ($conn->query($insertUserSql) === TRUE) {
            $message = "Signup successful. You can now log in.";
            $alertClass = "alert-success";
        } else {
            $message = "Error: " . $conn->error;
            $alertClass = "alert-danger";
        }
    } else {
        $message = "Username already exists. Please choose a different username.";
        $alertClass = "alert-danger";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup - Event Management System</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background: linear-gradient(120deg, #4361ee, #3a0ca3);
            color: #212529;
            font-family: 'Poppins', sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            min-height: 100vh;
            padding-top: 4rem;
        }

        .card {
            background: white;
            border-radius: 15px;
            padding: 2.5rem 2rem;
            width: 100%;
            max-width: 450px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        .card h2 {
            margin-bottom: 2rem;
            color: #4361ee;
            text-align: center;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
        }

        .form-group input {
            width: 100%;
            padding: 0.7rem;
            border: 1px solid #ccc;
            border-radius: 8px;
        }

        .btn {
            display: inline-block;
            width: 100%;
            background: #4895ef;
            color: white;
            padding: 0.8rem;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .btn:hover {
            background: #3a0ca3;
        }

        .alert {
            padding: 0.75rem 1rem;
            border-radius: 8px;
            margin-bottom: 1rem;
            font-weight: 500;
            text-align: center;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
        }

        .btn-success {
            background-color: var(--success-color);
            color: white;
            padding: 0.6rem 1.2rem;
            border-radius: 6px;
            text-decoration: none;
            display: inline-block;
            margin-top: 1rem;
        }

        .btn-success:hover {
            background-color: #3cb043;
        }
    </style>
</head>
<body>
    <section class="card">
        <h2><i class="fas fa-user-plus"></i> Create Your Account</h2>
        <?php if (isset($message)): ?>
            <div class="alert <?php echo $alertClass; ?>"><?php echo $message; ?></div>
        <?php endif; ?>
        <form method="post" action="">
            <div class="form-group">
                <label for="username"><i class="fas fa-user"></i> Username</label>
                <input type="text" id="username" name="username" required placeholder="Enter your username">
            </div>
            <div class="form-group">
                <label for="email"><i class="fas fa-envelope"></i> Email</label>
                <input type="email" id="email" name="email" required placeholder="Enter your email">
            </div>
            <div class="form-group">
                <label for="password"><i class="fas fa-lock"></i> Password</label>
                <input type="password" id="password" name="password" required placeholder="Create a password">
            </div>
            <button type="submit" class="btn btn-success"><i class="fas fa-user-plus"></i> Sign Up</button>
        </form>
        <p style="margin-top: 1rem; text-align: center;">
            Already have an account? <a href="login.php" class="btn">Login here</a>
        </p>
    </section>
</body>
</html>
